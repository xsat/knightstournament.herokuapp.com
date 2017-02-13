<?php

namespace Frontend\Controllers;

use Phalcon\Mvc\Controller;

/**
 * Class ParentController
 * @package Frontend\Controllers
 */
class ParentController extends Controller
{
    public function initialize()
    {
        $this->assets->addCss('/css/styles.css');

        $this->assets->addJs('https://code.jquery.com/jquery-1.12.4.js', false);
        $this->assets->addJs('https://code.jquery.com/ui/1.12.1/jquery-ui.js', false);

        $this->assets->addJs('/js/main.js');
    }
}
