<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lists Controller
 *
 *
 * @method \App\Model\Entity\List[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ListsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
				$lists = $this->Lists->find("all");

        $this->set(compact('lists'));
    }

    /**
     * View method
     *
     * @param string|null $id List id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
				$svrName = "Location: http://localhost";

				$distName = $svrName + "/deeplearning";

				return $this->redirect($distName);
				/*
        $list = $this->Lists->get($id, [
            'contain' => []
        ]);

        $this->set('list', $list);
				*/
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $list = $this->Lists->newEntity();
        if ($this->request->is('post')) {
            $list = $this->Lists->patchEntity($list, $this->request->getData());
            if ($this->Lists->save($list)) {
                $this->Flash->success(__('The list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The list could not be saved. Please, try again.'));
        }
        $this->set(compact('list'));
    }

    /**
     * Edit method
     *
     * @param string|null $id List id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $list = $this->Lists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $list = $this->Lists->patchEntity($list, $this->request->getData());
            if ($this->Lists->save($list)) {
                $this->Flash->success(__('The list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The list could not be saved. Please, try again.'));
        }
        $this->set(compact('list'));
    }

    /**
     * Delete method
     *
     * @param string|null $id List id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $list = $this->Lists->get($id);
        if ($this->Lists->delete($list)) {
            $this->Flash->success(__('The list has been deleted.'));
        } else {
            $this->Flash->error(__('The list could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
