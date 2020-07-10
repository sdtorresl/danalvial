<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactsController extends AppController
{
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function index()
    {
        $contact = $this->Contacts->newEmptyEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $courses = $this->Contacts->Courses->find('list', ['limit' => 200])->where(['branch_id =' => $this->branchId]);
        $branches = $this->Contacts->Branches->find('list', ['limit' => 200]);
        $this->set(compact('contact', 'courses', 'branches'));

        $contentsTable = TableRegistry::getTableLocator()->get('Contents');
        $contentContactUs = $contentsTable->findByBranch_idAndIdentifier($this->branchId, 'contact_us' . $this->branchId);
        $contentContactUs = $contentContactUs->toArray();

        $this->set(compact("contentContactUs"));
    }
}
