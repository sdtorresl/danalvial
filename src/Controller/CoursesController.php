<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 * @method \App\Model\Entity\Course[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoursesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $contentsTable = TableRegistry::getTableLocator()->get('Contents');
        $contentCourses = $contentsTable->findByBranch_idAndIdentifier($this->branchId, 'courses' . $this->branchId);
        $contentCourses = $contentCourses->toArray();

        $coursesTable = TableRegistry::getTableLocator()->get('Courses');
        $courses = $coursesTable->findByBranch_id($this->branchId);

        $this->set(compact('contentCourses', 'courses'));
    }
}
