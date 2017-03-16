<?php

namespace Frontend\Controllers;

use Frontend\Models\User;
use Frontend\Models\User\Registration;
use Frontend\Models\User\Login;
use Frontend\Forms\LoginForm;
use Frontend\Forms\RegistrationForm;
use Frontend\Forms\ForgotPasswordFrom;

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

        $model = new Registration();
        $form = new RegistrationForm();

        if ($this->saveModelFromForm($model, $form)) {
            $model->save([
                'status' => User::STATUS_PENDING,
            ]);

            $this->auth->setUser($model);

            return $this->response->redirect($this->url->get([
                'for' => 'confirmation',
            ]));
        }

        $this->view->setVar('form', $form);
    }

    public function loginAction()
    {
        if ($this->auth->isUser()) {
            return $this->defaultRedirect();
        }

        $model = new Login();
        $form = new LoginForm();

        if ($this->validateModelFromForm($model, $form)) {
            $this->auth->setUser($model);

            return $this->defaultRedirect();
        }

        $this->view->setVar('form', $form);
    }

    public function logoutAction()
    {
        $this->auth->removeUser();

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
        if ($this->auth->isUser()) {
            return $this->defaultRedirect();
        }

        $model = new User();
        $form = new ForgotPasswordFrom();

        if ($this->saveModelFromForm($model, $form)) {
            return $this->defaultRedirect();
        }

        $this->view->setVar('form', $form);
    }
}
