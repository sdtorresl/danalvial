<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Event\EventInterface;

/**
 * Us Controller
 *
 * @method \App\Model\Entity\U[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['index', 'frequentQuestions']);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $branchesTable = TableRegistry::getTableLocator()->get('Branches');
        $branches = $branchesTable->find();

        $branches_historiesTable = TableRegistry::getTableLocator()->get('BranchesHistories');
        $histories = $branches_historiesTable->findByBranch_id($this->branchId);
        $histories = $histories->toArray();

        $this->set(compact('branches', 'histories'));
    }

    public function frequentQuestions()
    {
        $frequent_questionsTable = TableRegistry::getTableLocator()->get('FrequentQuestions');
        $questions = $frequent_questionsTable->find();
        $questions = $questions->toArray();

        $contentsTable = TableRegistry::getTableLocator()->get('Contents');
        $contentFrequentQuestions = $contentsTable->findByBranch_idAndIdentifier($this->branchId, 'frequent_questions' . $this->branchId);
        $contentFrequentQuestions = $contentFrequentQuestions->toArray();

        $this->set(compact('questions', "contentFrequentQuestions"));
    }

}
