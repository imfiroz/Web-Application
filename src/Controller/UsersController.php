<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Posts']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
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
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	//Creating Login action -fb
	public function login(){
		//Before creating  template must be created inside template/users/login.ctp -fb
		//test to see if from is submitted -fb
		$this->request->is('post'); //check for post method -fb

				if($this->Auth->user('id')){ //if user had already login
					$this->Flash->warning(__('Your are already Logged In'));
					return $this->redirect(['controller' => 'users', 'action' => 'index']); //redirect to index page
				}else{ //if user are not already LoggedIn
					$user = $this->Auth->identify();
					if($user){ //check for user
						$this->Auth->setUser($user);
						$this->Flash->success(__('Login Successful')); //It well show on next page 
						return $this->redirect(['controller' => 'users', 'action' => 'index']); //redirect
						}
				}
		if($this->request->is('post')){$this->Flash->error(__('Incorrect credential.'));}
	}
	
	//logout action -fb
	public function logout(){
		$this->Flash->success('You are logged out');
		return $this->redirect($this->Auth->logout()); //redirect to logout
	}
	//Register action -fb but berfore we need to create a template inside emplate/users/register.ctp 
	public function register(){
		$user = $this->Users->newEntity();
		if($this->request->is('post')){
			$user = $this->Users->patchEntity($user, $this->request->data);
			if($this->Users->save($user)){ //if it save send a flash message
				$this->Flash->success('You are register and can login');
				return $this->redirect(['action' => 'login']); //redirect to action login 
			}else {
				//some reason they cant register
				$this->Flash->error('You are not register');
			}
		}
		//set the user not to get error any more
		$this->set(compact('user'));
		$this->set('_serialize',['user']); //also serialize and passing user
	}
	//Allowing Access for guest
	public function beforeFilter(Event $event){
		///Create a array pages want to allow with them having to login like about page terms and condition page 
		$this->Auth->allow(['register']);
	}
}
