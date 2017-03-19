<?php

namespace Frontend\Controllers;

/**
 * Class MainController
 * @package Frontend\Controllers
 */
class IndexController extends Controller
{
    public function indexAction()
    {

    }

    public function notFoundAction()
    {
        $this->response->setStatusCode(404);

        return 'Error 404';
    }

    public function testAction()
    {
        /*$this->assets->addCss('/css/test.css');
        $this->assets->addJs('/js/test.js?v' . rand());*/
    }
}
