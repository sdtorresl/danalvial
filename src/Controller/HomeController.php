<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Home Controller
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $contentsTable = TableRegistry::getTableLocator()->get('Contents');
        $contents = $contentsTable->find();

        $coursesTable = TableRegistry::getTableLocator()->get('Courses');
        $courses = $coursesTable->find();

        $advantagesTable = TableRegistry::getTableLocator()->get('Advantages');
        $advantages = $advantagesTable->find();
        //$home = $this->paginate($this->Home);

        $this->set(compact('contents', 'courses', 'advantages'));
    }

}
