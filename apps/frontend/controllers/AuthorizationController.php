<?php

namespace Frontend\Controllers;

use Frontend\Forms\ConfirmationForm;
use Frontend\Models\Confirm;
use Frontend\Models\User;
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

        $model = new User();
        $form = new RegistrationForm();

        if ($this->validateModelFromForm($model, $form)) {
            if ($model->save(['status' => User::STATUS_PENDING])) {
                $confirm = $model->createConfirm();

                return $this->response->redirect($this->url->get([
                    'for' => 'confirmation',
                    'params' => $confirm->token,
                ]));
            }
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

        if ($this->validateModelFromForm($model, $form)) {
            $user = User::findFirst([
                'conditions' => 'email = :email: AND password = :password:',
                'bind' => [
                    'email' => $model->email,
                    'password' => $model->crypt($model->password),
                ],
            ]);

            if ($user) {
                $this->auth->setUser($user);
                return $this->defaultRedirect();
            }

            $this->showMessage('Please enter a valid email address and password.');
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
        $model = Confirm::findFirst([
            'conditions' => 'status = :status: AND token = :token: AND date_expire >= :date_expire:',
            'bind' => [
                'status' => Confirm::STATUS_PENDING,
                'token' => $this->dispatcher->getParam('token', 'string'),
                'date_expire' => date('Y-m-d H:i:s'),
            ],
        ]);
        if (!$model) {
            return $this->defaultRedirect();
        }

        $form = new ConfirmationForm($model);

        if ($this->validateModelFromForm($model, $form)) {
            $model->save([
                'status' => Confirm::STATUS_CONFIRMED,
            ]);

            $model->user->save([
                'status' => User::STATUS_CONFIRMED,
            ]);

            $this->auth->setUser($model->user);

            return $this->defaultRedirect();
        }

        $this->view->setVar('form', $form);
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

        if ($this->validateModelFromForm($model, $form)) {
            return $this->defaultRedirect();
        }

        $this->view->setVar('form', $form);
    }
}
