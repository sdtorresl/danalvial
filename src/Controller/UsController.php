<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Us Controller
 *
 * @method \App\Model\Entity\U[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $branchesTable = TableRegistry::getTableLocator()->get('Branches');
        $branches = $branchesTable->find();

        //$us = $this->paginate($this->Us);

        $this->set(compact('branches'));
    }

}
