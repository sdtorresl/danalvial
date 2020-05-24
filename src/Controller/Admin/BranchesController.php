<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Branches Controller
 *
 * @property \App\Model\Table\BranchesTable $Branches
 * @method \App\Model\Entity\Branch[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BranchesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $branches = $this->paginate($this->Branches);

        $this->set(compact('branches'));
    }

    /**
     * View method
     *
     * @param string|null $id Branch id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $branch = $this->Branches->get($id, [
            'contain' => ['Contacts', 'Courses', 'Tests'],
        ]);

        $this->set(compact('branch'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $branch = $this->Branches->newEmptyEntity();
        if ($this->request->is('post')) {
            $branch = $this->Branches->patchEntity($branch, $this->request->getData());
            if ($this->Branches->save($branch)) {
                $this->Flash->success(__('The branch has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The branch could not be saved. Please, try again.'));
        }
        $this->set(compact('branch'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Branch id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $branch = $this->Branches->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $branch = $this->Branches->patchEntity($branch, $this->request->getData());
            if ($this->Branches->save($branch)) {
                $this->Flash->success(__('The branch has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The branch could not be saved. Please, try again.'));
        }
        $this->set(compact('branch'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Branch id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $branch = $this->Branches->get($id);
        try {
            if ($this->Branches->delete($branch)) {
                $this->Flash->success(__('The branch has been deleted.'));
            } else {
                $this->Flash->error(__('The branch could not be deleted. Please, try again.'));
            }
        } catch (\PDOException $th) {
            $this->Flash->error(__('The branch has associated data, could not be deleted. Please, try again.'));
            //throw $th;
        }
        

        return $this->redirect(['action' => 'index']);
    }
}
