<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $branchId = null;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        
        $session = $this->request->getSession();
        $this->branchId = $session->read('Config.branch');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    public function beforeRender(EventInterface $event) {
        parent::beforeRender($event);
    
        $controller = $event->getSubject();
        $request = $controller->getRequest();
        $params = $request->getAttribute("params");
        
        // Use admin layout on admin prefix
        if ( array_key_exists("prefix", $params) ) {
            if($params['prefix'] == 'Admin') {
                if ($controller->name == 'Users' && ($params['action'] == 'login' || $params['action'] == 'forgotPassword' || $params['action'] == 'resetPassword')) {
                    $this->viewBuilder()->setLayout('login');
                }
                else {
                    $this->viewBuilder()->setLayout('admin');
                }
                return;
            }
        }
        elseif ($controller->name == 'Home' && $params['action'] == 'option') {
            $this->viewBuilder()->setLayout('blank');
        }
        else {
            // Cheking branch session
            $session = $request->getSession();
            $this->branchId = $session->read('Config.branch');
        
            if($this->branchId == null) {
                return $this->redirect(['controller' => 'Home', 'action' => 'option']);
            }

            $brancesTable = TableRegistry::getTableLocator()->get('Branches');
            $branch = $brancesTable->findById($this->branchId);
            $branch = $branch->toArray();

            $this->set('branchId', $this->branchId);
            $this->set(compact('branch'));
        }
    }
}
