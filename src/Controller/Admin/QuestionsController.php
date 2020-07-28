<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 * @method \App\Model\Entity\Question[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuestionsController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $categories = ["category1" => __("category 1"), "category2" => __("category 2"), "category3" => __("category 3"), "category4" => __("category 4")];

        $this->set(compact('categories'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tests'],
        ];
        $questions = $this->paginate($this->Questions);

        $this->set(compact('questions'));
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => ['Tests', 'Answers'],
        ]);

        $this->set(compact('question'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($test_id = null)
    {
        $question = $this->Questions->newEmptyEntity();
        if ($this->request->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            $question->test_id = strval($test_id);
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));
                
                $redirect = $this->request->getQuery('redirect', false);
                $redirect = boolval($redirect);
                if ($redirect==true) {
                    return $this->redirect(['action' => 'view', $question->id]);
                }
                else {
                    return $this->redirect(['controller' => 'answers', 'action' => 'add', $question->id]);
                }
            }
            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
        $tests = $this->Questions->Tests->find('list', ['limit' => 200]);
        $this->set(compact('question', 'tests', 'test_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));

                return $this->redirect(['action' => 'view', $question->id]);
            }
            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
        $tests = $this->Questions->Tests->find('list', ['limit' => 200]);
        $this->set(compact('question', 'tests'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        try {
            if ($this->Questions->delete($question)) {
                $this->Flash->success(__('The question has been deleted.'));
            } else {
                $this->Flash->error(__('The question could not be deleted. Please, try again.'));
            }
        } catch (\PDOException $th) {
            $this->Flash->error('La pregunta tiene datos asociados, no se pudo eliminar. Inténtalo de nuevo.');
            //throw $th;
        }

        return $this->redirect(['controller' => 'Tests', 'action' => 'view', $question->test_id]);
    }
}
