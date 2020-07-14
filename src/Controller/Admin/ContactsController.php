<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\Locator\LocatorAwareTrait;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Courses', 'Branches'],
        ];
        $contacts = $this->paginate($this->Contacts);

        $this->set(compact('contacts'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // viewed message
        $contactViewTable = $this->getTableLocator()->get('Contacts');
        $contactView = $contactViewTable->find('all')->where(['id' => $id])->first();
        $contactView->viewed = '1';
        $contactViewTable->save($contactView);

        $contact = $this->Contacts->get($id, [
            'contain' => ['Courses', 'Branches'],
        ]);

        $this->set(compact('contact'));
    }
}
