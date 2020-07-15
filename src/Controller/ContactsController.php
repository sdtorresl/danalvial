<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Http\Client;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

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
            // reCaptcha validation
            $gcResponse = $this->request->getData('g-recaptcha-response');
            $http = new Client();
            $captchaResponse = $http->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => Configure::read('reCaptchaKeys.secret'), // TODO
                'response' => $gcResponse
            ]);
            $jsonResponse = $captchaResponse->getJson();
            
            if($jsonResponse['success']) {
                $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
                if ($this->Contacts->save($contact)) {
                    $this->Flash->success(__('Your message has been sent!'));
    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Your message hasn\'t been sent. Please, try again.'));
            }
            else {
                $this->Flash->error(__('Your didn\'t pass captcha validation. Please, try again.'));
            }
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
