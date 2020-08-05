<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\I18n\Time;
use Cake\Mailer\Mailer;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login', 'forgotPassword', 'resetPassword']);

        $roles = ["admin" => __("Administrator"), "student" => __("Student")];
        $this->set(compact('roles'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        try {
            if ($this->Users->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }
        } catch (\PDOException $th) {
            $this->Flash->error('El usuario tiene datos asociados, no se pudo eliminar. Inténtalo de nuevo.');
            //throw $th;
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login method
     * 
     * @return \Cake\Http\Response|null|void Redirects to index.
     */
    public function login() {

        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', ['controller' => 'Branches', 'action' => 'index',]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        }

        $this->viewBuilder()->setLayout('login');

    }

    public function forgotPassword() {

        if ($this->request->is('post')) {
            $email = $this->request->getData('email');

            $usersTable = TableRegistry::getTableLocator()->get('Users');
            $user = $usersTable->findByEmail($email);
            $user = $user->toArray();

            if ($user) {

                // Setting token to the user
                $usersTable = $this->getTableLocator()->get('Users');
                $userToken = $usersTable->get($user[0]['id']);
                $userToken->token = Text::uuid();
                $userToken->token_expiry_date = Time::now()->addHours(2);
                $userToken->token_used = false;
                $usersTable->save($userToken);

                // Creating message
                $url = Router::url([
                    'controller' => 'users',
                    'action' => 'resetPassword',
                ], true);
                $url .= '/'. $userToken->token;
                $message = 'Apreciado(a) ' . $user[0]['first_name'] . ', hemos recibido tu solicitud para restaurar la contraseña de tu cuenta. Para realizar el cambio haz clic en el siguiente enlace: <br><br>';
                $message .= '<a href=' . $url . '>Restablecer contraseña</a>';

                // Mail to user
                $mail = new Mailer('default');
                $mail->setFrom(['soporte@innovaciones.co' => 'Danalvial Ltda.'])
                    ->setTo($email)
                    ->setSubject('Danalvial - Restaurar contraseña')
                    ->deliver($message);

                $this->Flash->success('Por favor revisa tu correo electrónico para restablecer tu contraseña.');
                return $this->redirect(['action' => 'login']);

            }
            else {
                $this->Flash->error('Correo electrónico invalido');
            }
        }
    }

    public function resetPassword($token = null) {

        if (!empty($token)) {
            
            $usersTable = TableRegistry::getTableLocator()->get('Users');
            $user = $usersTable->findByToken($token);
            $user = $user->toArray();

            if ($user) {
                if ($this->request->is('post')) {
                    if (!$user[0]['token_used'] && Time::now()<$user[0]['token_expiry_date']) {
    
                        $newPassword = $this->request->getData('password');
    
                        
                        if ($this->request->getData('password') == $this->request->getData('passwordConfirmation')) {

                            // Setting token and new password
                            $usersTable = $this->getTableLocator()->get('Users');
                            $userToken = $usersTable->get($user[0]['id']);
                            $userToken->token_used = true;
                            $userToken->password = $newPassword;

                            if ($usersTable->save($userToken)) {
                                $this->Flash->success('Tu nueva contraseña ha sido actualizada satisfactoriamente.');
                                return $this->redirect(['action' => 'login']);
                            }
                            else {
                                $this->Flash->error('Tu contraseña no se pudo guardar. Inténtalo de nuevo.');
                            }
                        }
                        else {
                            $this->Flash->error('Las contraseñas no coinciden. Verifica de nuevo.');
                        }
                    }
                    else {
                        $this->Flash->error('El token ha expirado o ya ha sido utilizado.');
                        return $this->redirect(['action' => 'login']);
                    }
                }
            }
            else {
                $this->Flash->error('El token ha expirado o ya se ha utilizado.');
                return $this->redirect(['action' => 'login']);
            }
        }
    }

    /**
     * Logout method
     * 
     * @return \Cake\Http\Response|null|void Redirects to index.
     */
    public function logout() {

        $result = $this->Authentication->getResult();
        
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
}
