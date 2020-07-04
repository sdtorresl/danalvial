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
        $gallery = $galleriesTable->findByBranch_id($this->branchId);

        $contentsTable = TableRegistry::getTableLocator()->get('Contents');
        $contentHome = $contentsTable->findByBranch_idAndIdentifier($this->branchId, 'homepage' . $this->branchId);
        $contentHome = $contentHome->toArray();

        $coursesTable = TableRegistry::getTableLocator()->get('Courses');
        $courses = $coursesTable->findByBranch_id($this->branchId);

        $advantagesTable = TableRegistry::getTableLocator()->get('Advantages');
        $advantages = $advantagesTable->findByBranch_id($this->branchId);

        $this->set(compact('courses', 'advantages', 'contentHome', 'gallery'));
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
