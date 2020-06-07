<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Advantages Controller
 *
 * @property \App\Model\Table\AdvantagesTable $Advantages
 * @method \App\Model\Entity\Advantage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdvantagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $advantages = $this->paginate($this->Advantages);

        $this->set(compact('advantages'));
    }

    /**
     * View method
     *
     * @param string|null $id Advantage id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $advantage = $this->Advantages->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('advantage'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $advantage = $this->Advantages->newEmptyEntity();
        if ($this->request->is('post')) {
            $advantage = $this->Advantages->patchEntity($advantage, $this->request->getData());
            if ($this->Advantages->save($advantage)) {
                $this->Flash->success(__('The advantage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The advantage could not be saved. Please, try again.'));
        }
        $this->set(compact('advantage'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Advantage id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $advantage = $this->Advantages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $advantage = $this->Advantages->patchEntity($advantage, $this->request->getData());
            if ($this->Advantages->save($advantage)) {
                $this->Flash->success(__('The advantage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The advantage could not be saved. Please, try again.'));
        }
        $this->set(compact('advantage'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Advantage id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $advantage = $this->Advantages->get($id);
        if ($this->Advantages->delete($advantage)) {
            $this->Flash->success(__('The advantage has been deleted.'));
        } else {
            $this->Flash->error(__('The advantage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
