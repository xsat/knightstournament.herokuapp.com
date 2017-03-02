<?php

namespace Frontend\Controllers;

use Frontend\Models\User;
use Frontend\Forms\RegistrationForm;

/**
 * Class AuthorizationController
 * @package Frontend\Controllers
 */
class AuthorizationController extends Controller
{
    public function registrationAction()
    {
        $model = new User();
        $form = new RegistrationForm();

        if ($this->saveModelFromForm($model, $form)) {
            $this->response->redirect($this->url->get(['name' => 'confirmation']));
        }

        $this->view->setVar('form', $form);
    }

    public function loginAction()
    {

    }

    public function logoutAction()
    {

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
