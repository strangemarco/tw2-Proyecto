<?php declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }

    public function login()
{
    $this->request->allowMethod(['get', 'post']);

    $result = $this->Authentication->getResult();

    if ($this->request->is('post')) {
        if ($result && $result->isValid()) {
            $redirect = $this->request->getQuery('redirect');

            if ($redirect) {
                return $this->redirect($redirect);
            }

            return $this->redirect([
                'controller' => 'Categorias',
                'action' => 'index',
            ]);
        }

        if ($result && !$result->isValid()) {
            $this->Flash->error('Correo o contraseña incorrectos');
        }
    }

    if ($result && $result->isValid()) {
        $redirect = $this->request->getQuery('redirect');

        if ($redirect) {
            return $this->redirect($redirect);
        }

        return $this->redirect([
            'controller' => 'Users',
            'action' => 'index',
        ]);
    }
}
    public function logout()
    {
        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            $this->Flash->success('Has cerrado sesión correctamente');
        }

        return $this->redirect(['action' => 'login']);
    }

    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);
        $this->set(compact('users'));
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success('El usuario ha sido guardado.');
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('No se pudo guardar el usuario. Intenta nuevamente.');
        }

        $this->set(compact('user'));
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success('El usuario ha sido actualizado.');
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('No se pudo actualizar el usuario. Intenta nuevamente.');
        }

        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $user = $this->Users->get($id);

        if ($this->Users->delete($user)) {
            $this->Flash->success('El usuario ha sido eliminado.');
        } else {
            $this->Flash->error('No se pudo eliminar el usuario. Intenta nuevamente.');
        }

        return $this->redirect(['action' => 'index']);
    }
}