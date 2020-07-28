<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Answers Controller
 *
 * @property \App\Model\Table\AnswersTable $Answers
 * @method \App\Model\Entity\Answer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnswersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Questions'],
        ];
        $answers = $this->paginate($this->Answers);

        $this->set(compact('answers'));
    }

    /**
     * View method
     *
     * @param string|null $id Answer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $answer = $this->Answers->get($id, [
            'contain' => ['Questions'],
        ]);

        $this->set(compact('answer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($question_id = null)
    {
        $answer = $this->Answers->newEmptyEntity();
        if ($this->request->is('post')) {
            $answer = $this->Answers->patchEntity($answer, $this->request->getData());
            $answer->question_id = strval($question_id);
            if ($this->Answers->save($answer)) {
                $this->Flash->success(__('The answer has been saved.'));

                return $this->redirect(['controller' => 'Questions', 'action' => 'view', $question_id]);
            }
            $this->Flash->error(__('The answer could not be saved. Please, try again.'));
        }
        $questions = $this->Answers->Questions->find('list', ['limit' => 200]);
        $this->set(compact('answer', 'questions', 'question_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Answer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $answer = $this->Answers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $answer = $this->Answers->patchEntity($answer, $this->request->getData());
            if ($this->Answers->save($answer)) {
                $this->Flash->success(__('The answer has been saved.'));

                return $this->redirect(['controller' => 'Questions', 'action' => 'view', $answer->question_id]);
            }
            $this->Flash->error(__('The answer could not be saved. Please, try again.'));
        }
        $questions = $this->Answers->Questions->find('list', ['limit' => 200]);
        $this->set(compact('answer', 'questions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Answer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $answer = $this->Answers->get($id);
        try {
            if ($this->Answers->delete($answer)) {
                $this->Flash->success(__('The answer has been deleted.'));
            } else {
                $this->Flash->error(__('The answer could not be deleted. Please, try again.'));
            }
        } catch (\PDOException $th) {
            $this->Flash->error('La respuesta tiene datos asociados, no se pudo eliminar. Inténtalo de nuevo.');
            //throw $th;
        }

        return $this->redirect(['controller' => 'Questions', 'action' => 'view', $answer->question_id]);
    }
}
