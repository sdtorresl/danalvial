<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Training Controller
 *
 * @method \App\Model\Entity\Training[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrainingController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $contentsTable = TableRegistry::getTableLocator()->get('Contents');
        $contentTraining = $contentsTable->findByBranch_idAndIdentifier($this->branchId, 'training' . $this->branchId);
        $contentTraining = $contentTraining->toArray();

        $coursesTable = TableRegistry::getTableLocator()->get('Courses');
        $courses = $coursesTable->findByBranch_id($this->branchId);

        $this->set(compact('contentTraining', 'courses'));
    }
}
