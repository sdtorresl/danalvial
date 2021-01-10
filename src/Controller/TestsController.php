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
        $categoryResults = $questionsTable->find();
        $categoryResults->select(['category',])
            ->group(['category']);
        $categoryResults = $categoryResults->toArray();

        for($n=0;$n<count($categoryResults);$n++) {
            $categoryResults[$n]['total'] = 0;
            $categoryResults[$n]['correct'] = 0;
        }

        $total = 0;
        $correct = 0;
        $percentageResult = 0;

        if ($this->request->is('post')) {
            $test = $this->Tests->get($id, ['contain' => ['Questions.Answers'],]);

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
                        foreach($question->answers as $answer) {
                            if($answer->id == $userAnswers[$i]['answer_id']) {
                                foreach ($categoryResults as $categoryResult) {
                                    if($categoryResult['category'] == $question->category) {
                                        $categoryResult['total'] = $categoryResult['total'] + 1;
                                        $total = $total + 1;
                                        if($answer->result) {
                                            $categoryResult['correct'] = $categoryResult['correct'] + 1;
                                            $correct = $correct + 1;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            $percentageResult = ($correct * 100) / $total;

            $this->set(compact('test', 'percentageResult'));
        }

        $categories = ["medio" => "Adaptación al medio", "ética" => "Ética", "legal" => "Marco Legal", "mecánica" => "Mecánica Basica", "técnicas" => "Técnicas de conducción"];

        $this->set(compact('categories', 'categoryResults'));
    }
}
