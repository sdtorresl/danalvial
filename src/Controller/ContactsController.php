<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Http\Client;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Mailer\Mailer;
use Cake\Event\EventInterface;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactsController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['index']);
    }

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

                    $message = 'Hemos recibido su mensaje en nuestra página web:<br><br>';
                    $message .= 'Nombres: ' . $contact->first_name . '<br>';
                    $message .= 'Apellidos: ' . $contact->last_name . '<br>';
                    $message .= 'Teléfono: ' . $contact->telephone . '<br>';
                    $message .= 'Sede: ' . $contact->branch_id . '<br>';
                    $message .= 'Curso de interes: ' . $contact->course_id . '<br>';
                    $message .= 'Mensaje: ' . $contact->message . '<br>';

                    // Mail to contact
                    $mail = new Mailer('default');
                    $mail->setFrom(['soporte@innovaciones.co' => 'Danalvial Ltda.'])
                        ->setTo($contact->email)
                        ->setSubject(__('New message on Danalvial Ltda.'))
                        ->deliver($message);

                    $message = 'Un usuario ha enviado un nuevo mensaje en la página web.<br><br>';
                    $message .= 'Nombres: ' . $contact->first_name . '<br>';
                    $message .= 'Apellidos: ' . $contact->last_name . '<br>';
                    $message .= 'Correo: ' . $contact->email . '<br>';
                    $message .= 'Teléfono: ' . $contact->telephone . '<br>';
                    $message .= 'Sede: ' . $contact->branch_id . '<br>';
                    $message .= 'Curso de interes: ' . $contact->course_id . '<br>';
                    $message .= 'Mensaje: ' . $contact->message . '<br>';

                    // Mail to Admin
                    $mail = new Mailer('default');
                    $mail->setFrom(['soporte@innovaciones.co' => 'Danalvial Ltda.'])
                        ->setTo('slsanchezf@innovaciones.co')
                        ->setSubject(__('New message on Danalvial Ltda.'))
                        ->deliver($message);

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
