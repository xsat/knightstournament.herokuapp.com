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

    public function testAction()
    {
        $this->assets->addCss('/css/test.css');
        $this->assets->addJs('/js/test.js?v' . rand());
    }
}
