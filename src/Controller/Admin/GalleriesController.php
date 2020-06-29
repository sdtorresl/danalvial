<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Galleries Controller
 *
 * @property \App\Model\Table\GalleriesTable $Galleries
 * @method \App\Model\Entity\Gallery[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GalleriesController extends AppController
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
        $galleries = $this->paginate($this->Galleries);

        $this->set(compact('galleries'));
    }

    /**
     * View method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gallery = $this->Galleries->get($id, [
            'contain' => ['Branches'],
        ]);

        $this->set(compact('gallery'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gallery = $this->Galleries->newEmptyEntity();
        if ($this->request->is('post')) {
            $gallery = $this->Galleries->patchEntity($gallery, $this->request->getData());
            if ($this->Galleries->save($gallery)) {
                $this->Flash->success(__('The gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gallery could not be saved. Please, try again.'));
        }
        $branches = $this->Galleries->Branches->find('list', ['limit' => 200]);
        $this->set(compact('gallery', 'branches'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gallery = $this->Galleries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gallery = $this->Galleries->patchEntity($gallery, $this->request->getData());
            if ($this->Galleries->save($gallery)) {
                $this->Flash->success(__('The gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gallery could not be saved. Please, try again.'));
        }
        $branches = $this->Galleries->Branches->find('list', ['limit' => 200]);
        $this->set(compact('gallery', 'branches'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gallery = $this->Galleries->get($id);
        if ($this->Galleries->delete($gallery)) {
            $this->Flash->success(__('The gallery has been deleted.'));
        } else {
            $this->Flash->error(__('The gallery could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
