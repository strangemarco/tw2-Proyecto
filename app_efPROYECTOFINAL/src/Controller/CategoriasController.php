<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Categorias Controller
 *
 * @property \App\Model\Table\CategoriasTable $Categorias
 */
class CategoriasController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event): void
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions([]);
    }

    public function index()
    {
        $query = $this->Categorias->find();
        $categorias = $this->paginate($query);

        $this->set(compact('categorias'));
    }

    public function view($id = null)
    {
        $categoria = $this->Categorias->get($id, contain: []);
        $this->set(compact('categoria'));
    }

    public function add()
    {
        $categoria = $this->Categorias->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $categoria = $this->Categorias->patchEntity($categoria, $data);

            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('La categoría ha sido guardada correctamente.'));
                return $this->redirect(['action' => 'index']);
            }

            $errors = $categoria->getErrors();
            if (!empty($errors)) {
                $errorMessages = [];
                foreach ($errors as $fieldErrors) {
                    foreach ($fieldErrors as $error) {
                        $errorMessages[] = $error;
                    }
                }
                $this->Flash->error(implode(' | ', $errorMessages));
            } else {
                $this->Flash->error(__('La categoría no pudo ser guardada. Por favor, intenta nuevamente.'));
            }
        }

        $this->set(compact('categoria'));
    }

    public function edit($id = null)
    {
        $categoria = $this->Categorias->get($id, contain: []);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            $categoria = $this->Categorias->patchEntity($categoria, $data, [
                'validate' => 'update'
            ]);

            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('La categoría ha sido actualizada correctamente.'));
                return $this->redirect(['action' => 'index']);
            }

            $errors = $categoria->getErrors();
            if (!empty($errors)) {
                $errorMessages = [];
                foreach ($errors as $fieldErrors) {
                    foreach ($fieldErrors as $error) {
                        $errorMessages[] = $error;
                    }
                }
                $this->Flash->error(implode(' | ', $errorMessages));
            } else {
                $this->Flash->error(__('La categoría no pudo ser actualizada. Por favor, intenta nuevamente.'));
            }
        }

        $this->set(compact('categoria'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $categoria = $this->Categorias->get($id);

        if ($this->Categorias->delete($categoria)) {
            $this->Flash->success(__('La categoría ha sido eliminada correctamente.'));
        } else {
            $this->Flash->error(__('La categoría no pudo ser eliminada. Por favor, intenta nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}