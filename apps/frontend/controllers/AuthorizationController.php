<?php

namespace Frontend\Controllers;

use Frontend\Forms\RegistrationForm;

/**
 * Class AuthorizationController
 * @package Frontend\Controllers
 */
class AuthorizationController extends Controller
{
    public function registrationAction()
    {
        $form = new RegistrationForm();

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
