<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Event\EventInterface;
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
    }

    public function login() {

        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /tests after login success
            $redirect = $this->request->getQuery('redirect', ['controller' => 'Tests', 'action' => 'view', $this->branchId]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        }
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
                        return $this->redirect(['controller' => 'Home', 'action' => 'index']);
                    }
                }
            }
            else {
                $this->Flash->error('El token ha expirado o ya se ha utilizado.');
                return $this->redirect(['controller' => 'Home', 'action' => 'index']);
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
