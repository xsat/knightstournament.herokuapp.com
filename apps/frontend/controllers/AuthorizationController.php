<?php

namespace Frontend\Controllers;

use Frontend\Models\User;
use Frontend\Forms\LoginForm;
use Frontend\Forms\RegistrationForm;

/**
 * Class AuthorizationController
 * @package Frontend\Controllers
 */
class AuthorizationController extends Controller
{
    public function registrationAction()
    {
        if ($this->auth->isUser()) {
            return $this->defaultRedirect();
        }

        $model = new User();
        $form = new RegistrationForm();

        if ($this->saveModelFromForm($model, $form)) {
            return $this->response->redirect($this->url->get([
                'name' => 'confirmation',
            ]));
        }

        $this->view->setVar('form', $form);
    }

    public function loginAction()
    {
        if ($this->auth->isUser()) {
            return $this->defaultRedirect();
        }

        $model = new User();
        $form = new LoginForm();

        if ($this->saveModelFromForm($model, $form)) {
            return $this->defaultRedirect();
        }

        $this->view->setVar('form', $form);
    }

    public function logoutAction()
    {
        return $this->defaultRedirect();
    }

    public function confirmationAction()
    {
    }

    public function resetPasswordAction()
    {

    }

    public function forgotPasswordAction()
    {

    }
}
