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
        $contentSection = $contentsTable->findByIdentifier('training');
        $contentSection = $contentSection->toArray();

        $this->set(compact('contentSection'));
    }
}
