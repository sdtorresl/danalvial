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
        $galleriesTable = TableRegistry::getTableLocator()->get('Galleries');
        $gallery = $galleriesTable->findByBranch_id('1');

        $contentsTable = TableRegistry::getTableLocator()->get('Contents');
        $contentSection5 = $contentsTable->findByIdentifier('homepage');
        $contentSection5 = $contentSection5->toArray();

        $coursesTable = TableRegistry::getTableLocator()->get('Courses');
        $courses = $coursesTable->find();

        $advantagesTable = TableRegistry::getTableLocator()->get('Advantages');
        $advantages = $advantagesTable->find();

        $brancesTable = TableRegistry::getTableLocator()->get('Branches');
        $branch = $brancesTable->findByName('Medellin');
        $branch = $branch->toArray();
        
        //$home = $this->paginate($this->Home);

        $this->set(compact('courses', 'advantages', 'contentSection5', 'branch', 'gallery'));
    }

    public function option($id = null)
    {
        $session = $this->request->getSession();
        //$id = $session->read('Config.branch') ?? $id;

        if($id == null) {
            $branchesTable = TableRegistry::getTableLocator()->get('Branches');
            $branches = $branchesTable->find();

            $this->set(compact('branches'));
        }
        else {
            $session->write('Config.branch', $id);

            return $this->redirect(['action' => 'index']);
        }
    }
}
