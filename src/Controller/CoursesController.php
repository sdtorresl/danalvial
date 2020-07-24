<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Event\EventInterface;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 * @method \App\Model\Entity\Course[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoursesController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['index', 'course']);
    }

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

    public function course($id = null)
    {
        $coursesTable = TableRegistry::getTableLocator()->get('Courses');
        $course = $coursesTable->findByBranch_idAndId($this->branchId, $id);
        $course = $course->toArray();

        $this->set(compact('course'));
    }
}
