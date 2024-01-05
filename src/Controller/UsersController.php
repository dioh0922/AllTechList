<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->Users->find("all");
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->getRequest()->getData());
            if ($this->Users->save($user)) {
                //$this->Flash->success(__('The user has been saved.'));

                return $this->redirect(["controller" => "Lists", 'action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
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

    public function login()
    {
        if($this->request->is("post")){
            $user = $this->Auth->identify();
            $request = $this->request->getData();
            $accept = $this->Users->get($request["userID"]);
            if($accept["accept"] === 1){

                if($user){
                    $this->Auth->setUser($user);
                    if(!empty($this->redirect($this->Auth->redirectURL()))){
                        return $this->redirect($this->Auth->redirectURL());
                    }else {
                        return $this->redirect("/lists");
                    }
                }
            }
            $this->Flash->error(__("ログイン情報が不正です。"));
        }
    }

    public function logout()
    {
        $this->Flash->success(__("ログアウトしました"));
        return $this->redirect($this->Auth->logout());
    }

    public function initialize(): void
    {
        parent::initialize();
        $this->Auth->allow(["logout", "add"]);
    }

    /**
     * 管理用画面
     */
    public function admin(){
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $userId = $data["userID"];
            $list = $this->Users->get($userId, [
                'contain' => []
            ]);
            $list->accept = 0;
            $logined = $this->Auth->user();
            if($data["userID"] === $logined["userID"]){
                $this->Flash->error(__('ログインユーザは無効にできません'));
                return $this->redirect(['action' => 'admin']);
            }

            if ($this->Users->save($list)) {
                $this->Flash->success(__('ユーザを無効にしました'));

                return $this->redirect(['action' => 'admin']);
            }
            $this->Flash->error(__('The list could not be saved. Please, try again.'));
        }
        $users = $this->Users->find("all");
        $this->set(compact('users'));
        
    }

}
