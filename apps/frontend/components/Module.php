<?php

namespace Frontend;

use Common\Router;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View\Engine\Volt;
use Frontend\Session\Authorization;
use Phalcon\Flash\Direct as FlashDirect;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\Model\Metadata\Files as MetadataFiles;

/**
 * Class Module
 * @package Frontend
 */
class Module implements ModuleDefinitionInterface
{
    /**
     * @param DiInterface|null $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();
        $loader->registerNamespaces([
            __NAMESPACE__ =>  __DIR__ . '/../libraries/',
            __NAMESPACE__ . '\Models' => __DIR__ . '/../models/',
            __NAMESPACE__ . '\Forms' => __DIR__ . '/../forms/',
            __NAMESPACE__ . '\Controllers' => __DIR__ . '/../controllers/',
            __NAMESPACE__ . '\Interfaces' => __DIR__ . '/../interfaces/',
        ]);
        $loader->register();
    }

    /**
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        $di->set('router', function() {
            return new Router();
        }, true);
        $di->set('auth', function() {
            return new Authorization();
        }, true);
        $di->set('flash', function() {
            return new FlashDirect([
                'error' => 'alert alert-danger',
                'notice' => 'alert alert-warning',
                'success' => 'alert alert-success',
                'warning' => 'alert alert-warning',
            ]);
        }, true);
        $di->set('modelsMetadata', function() {
            return new MetadataFiles([
                'metaDataDir' => __DIR__ . '/../cache/models/',
            ]);
        }, true);
        $di->set('view', function() use ($di) {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/../views/');
            $view->setLayoutsDir('layouts/');
            $view->setLayout('index');
            $view->setTemplateBefore('public');
            $view->registerEngines([
                '.volt' => function() use ($view, $di) {
                    $volt = new Volt($view, $di);
                    $volt->setOptions([
                        'compiledPath' => __DIR__ . '/../cache/views/',
                        'compiledSeparator' => '_',
                    ]);
                    return $volt;
                },
                '.phtml' => 'Phalcon\Mvc\View\Engine\Php',
            ]);
            return $view;
        }, true);
    }
}
