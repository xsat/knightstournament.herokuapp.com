<?php

namespace Frontend\Controllers;

use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\Response;
use Phalcon\Mvc\ModelInterface;
use Phalcon\Http\ResponseInterface;
use Frontend\Interfaces\Form as FormInterface;
use Phalcon\Mvc\Controller as PhalconController;

/**
 * Class Controller
 * @package Frontend\Controllers
 * @property \Frontend\Session\Authorization $auth
 */
class Controller extends PhalconController
{
    public function initialize()
    {
        $this->assets->addCss('/css/bootstrap.min.css');
        $this->assets->addCss('/css/styles.css');
        $this->assets->addJs('https://code.jquery.com/jquery-1.12.4.js', false);
        $this->assets->addJs('https://code.jquery.com/ui/1.12.1/jquery-ui.js', false);
        $this->assets->addJs('/js/bootstrap.min.js');
        $this->assets->addJs('/js/main.js');
    }

    /**
     * @param Dispatcher $dispatcher
     */
    public function afterExecuteRoute(Dispatcher $dispatcher)
    {
        if ($this->auth->isUser()) {
            $this->view->setTemplateBefore('authorized');
        }

        $this->view->setVar('user', $this->auth->getUser());
    }

    /**
     * @return Response|ResponseInterface
     */
    protected function notFoundRedirect()
    {
        return $this->response->redirect([
            'for' => 'not-found',
        ]);
    }

    /**
     * @return Response|ResponseInterface
     */
    protected function defaultRedirect()
    {
        if ($this->auth->isUser()) {
            return $this->response->redirect([
                'for' => 'home',
            ]);
        }

        return $this->response->redirect([
            'for' => 'home',
        ]);
    }

    /**
     * @param ModelInterface $model
     * @param FormInterface $form
     * @return bool
     */
    protected function saveModelFromForm(ModelInterface $model, FormInterface $form)
    {
        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost(), $model) && $model->save()) {
                return true;
            } elseif ($model->validationHasFailed()) {
                foreach ($model->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
            }
        }

        return false;
    }
}
