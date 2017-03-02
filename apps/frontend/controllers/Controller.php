<?php

namespace Frontend\Controllers;

use Phalcon\Mvc\ModelInterface;
use Frontend\Interfaces\Form as FormInterface;
use Phalcon\Mvc\Controller as PhalconController;

/**
 * Class Controller
 * @package Frontend\Controllers
 */
class Controller extends PhalconController
{
    public function initialize()
    {
        $this->assets->addCss('/css/styles.css');
        $this->assets->addJs('https://code.jquery.com/jquery-1.12.4.js', false);
        $this->assets->addJs('https://code.jquery.com/ui/1.12.1/jquery-ui.js', false);
        $this->assets->addJs('/js/main.js');
    }

    /**
     * @param $model
     * @param $form
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
