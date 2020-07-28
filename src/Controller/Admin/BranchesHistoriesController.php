<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * BranchesHistories Controller
 *
 * @property \App\Model\Table\BranchesHistoriesTable $BranchesHistories
 * @method \App\Model\Entity\BranchesHistory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BranchesHistoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Branches'],
        ];
        $branchesHistories = $this->paginate($this->BranchesHistories);

        $this->set(compact('branchesHistories'));
    }

    /**
     * View method
     *
     * @param string|null $id Branches History id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $branchesHistory = $this->BranchesHistories->get($id, [
            'contain' => ['Branches'],
        ]);

        $this->set(compact('branchesHistory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $branchesHistory = $this->BranchesHistories->newEmptyEntity();
        if ($this->request->is('post')) {
            $branchesHistory = $this->BranchesHistories->patchEntity($branchesHistory, $this->request->getData());
            if ($this->BranchesHistories->save($branchesHistory)) {
                $this->Flash->success(__('The branches history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The branches history could not be saved. Please, try again.'));
        }
        $branches = $this->BranchesHistories->Branches->find('list', ['limit' => 200]);
        $this->set(compact('branchesHistory', 'branches'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Branches History id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $branchesHistory = $this->BranchesHistories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $branchesHistory = $this->BranchesHistories->patchEntity($branchesHistory, $this->request->getData());
            if ($this->BranchesHistories->save($branchesHistory)) {
                $this->Flash->success(__('The branches history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The branches history could not be saved. Please, try again.'));
        }
        $branches = $this->BranchesHistories->Branches->find('list', ['limit' => 200]);
        $this->set(compact('branchesHistory', 'branches'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Branches History id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $branchesHistory = $this->BranchesHistories->get($id);
        try {
            if ($this->BranchesHistories->delete($branchesHistory)) {
                $this->Flash->success(__('The branches history has been deleted.'));
            } else {
                $this->Flash->error(__('The branches history could not be deleted. Please, try again.'));
            }
        } catch (\PDOException $th) {
            $this->Flash->error('La historia de la sede tiene datos asociados, no se pudo eliminar. Inténtalo de nuevo.');
            //throw $th;
        }

        return $this->redirect(['action' => 'index']);
    }
}
