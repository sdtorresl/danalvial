<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Event\EventInterface;

/**
 * Tests Controller
 *
 * @property \App\Model\Table\TestsTable $Tests
 * @method \App\Model\Entity\Test[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TestsController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['index']);
    }

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
        $tests = $this->paginate($this->Tests);

        $this->set(compact('tests'));
    }

    /**
     * View method
     *
     * @param string|null $id Test id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $test = $this->Tests->get($id, [
            'contain' => ['Questions.Answers'],
        ]);

        $token = $this->request->getCookie('csrfToken');

        $this->set(compact('test', 'token'));
    }

    public function result($id = null) {
        // getting questions quantity for each category
        $questionsTable = TableRegistry::getTableLocator()->get('Questions');
        $testResults = $questionsTable->find();
        $testResults->select(['category', 'total' => $testResults->func()->count('*')])
            ->group(['category']);
        $testResults = $testResults->toArray();
        for($n=0;$n<count($testResults);$n++) {
            $testResults[$n]['correct'] = 0;
        }

        
        if ($this->request->is('post')) {
            $test = $this->Tests->get($id, [
                'contain' => ['Questions.Answers'],
                ]);
                
                // getting user answers
                $requestAnswers = $this->request->getData();
                foreach($requestAnswers as $requestAnswer) {
                    $splitAnswer = explode("_", $requestAnswer);
                    $userAnswers[] = ['question_id' => $splitAnswer[0], 'answer_id' => $splitAnswer[1]];
                }
                
                // getting user's results
                foreach($test->questions as $question) {
                    for($i=0;$i<count($userAnswers);$i++) {
                        if($question->id == $userAnswers[$i]['question_id']) {
                            $this->Flash->success('A ' . $question->id . ' B ' . $userAnswers[$i]['question_id']);
                            
                            foreach($question->answers as $answer) {
                                if($answer->id == $userAnswers[$i]['answer_id']) {
                                    $resultadito = $answer->result ? 'true' : 'false';
                                $this->Flash->success($question->category . ' ' . $resultadito);
                                //$this->Flash->success('X ' . $answer->id . ' Y ' . $userAnswers[$i]['answer_id'] . $resultadito);

                                foreach ($testResults as $testResult) {
                                    if($testResult['category'] == $question->category && $answer->result) {
                                        //$this->Flash->success('O ' . $testResult['category'] . ' O ' . $question->category);
                                        $testResult['correct'] = $testResult['correct'] + 1;
                                    }
                                }
                            }
                        }
                    }
                }
            }
            
            $this->set(compact('test', 'userAnswers'));
        }

        $this->set(compact('testResults'));
    }
}
