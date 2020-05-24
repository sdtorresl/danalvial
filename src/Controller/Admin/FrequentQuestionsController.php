<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * FrequentQuestions Controller
 *
 * @property \App\Model\Table\FrequentQuestionsTable $FrequentQuestions
 * @method \App\Model\Entity\FrequentQuestion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FrequentQuestionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $frequentQuestions = $this->paginate($this->FrequentQuestions);

        $this->set(compact('frequentQuestions'));
    }

    /**
     * View method
     *
     * @param string|null $id Frequent Question id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $frequentQuestion = $this->FrequentQuestions->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('frequentQuestion'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $frequentQuestion = $this->FrequentQuestions->newEmptyEntity();
        if ($this->request->is('post')) {
            $frequentQuestion = $this->FrequentQuestions->patchEntity($frequentQuestion, $this->request->getData());
            if ($this->FrequentQuestions->save($frequentQuestion)) {
                $this->Flash->success(__('The frequent question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frequent question could not be saved. Please, try again.'));
        }
        $this->set(compact('frequentQuestion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Frequent Question id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $frequentQuestion = $this->FrequentQuestions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $frequentQuestion = $this->FrequentQuestions->patchEntity($frequentQuestion, $this->request->getData());
            if ($this->FrequentQuestions->save($frequentQuestion)) {
                $this->Flash->success(__('The frequent question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frequent question could not be saved. Please, try again.'));
        }
        $this->set(compact('frequentQuestion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Frequent Question id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $frequentQuestion = $this->FrequentQuestions->get($id);
        if ($this->FrequentQuestions->delete($frequentQuestion)) {
            $this->Flash->success(__('The frequent question has been deleted.'));
        } else {
            $this->Flash->error(__('The frequent question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
