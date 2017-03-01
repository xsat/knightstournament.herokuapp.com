<?php

namespace Frontend;

use Common\Router;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\Model\Metadata\Files as MetadataFiles;

/**
 * Class Module
 * @package Frontend
 */
class Module implements ModuleDefinitionInterface
{
    /**
     * @param DiInterface|null $dependencyInjector
     */
    public function registerAutoloaders(DiInterface $dependencyInjector = null)
    {
        $loader = new Loader();
        $loader->registerNamespaces([
            __NAMESPACE__ =>  __DIR__ . '/../libraries/',
            __NAMESPACE__ . '\Models' => __DIR__ . '/../models/',
            __NAMESPACE__ . '\Forms' => __DIR__ . '/../forms/',
            __NAMESPACE__ . '\Controllers' => __DIR__ . '/../controllers/',
        ]);
        $loader->register();
    }

    /**
     * @param DiInterface $dependencyInjector
     */
    public function registerServices(DiInterface $dependencyInjector)
    {
        $dependencyInjector->set('dispatcher', function() {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace(__NAMESPACE__ . '\Controllers');
            return $dispatcher;
        }, true);
        $dependencyInjector->set('flashSession', function() {
            return new FlashSession([
                'error' => 'alert alert-danger',
                'notice' => 'alert alert-warning',
                'success' => 'alert alert-success',
                'warning' => 'alert alert-warning',
            ]);
        }, true);
        $dependencyInjector->set('modelsMetadata', function() {
            return new MetadataFiles([
                'metaDataDir' => __DIR__ . '/../cache/models/',
            ]);
        }, true);
        $dependencyInjector->set('view', function() use ($dependencyInjector) {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/../views/');
            $view->setLayoutsDir('layouts/');
            $view->setLayout('public');
            $view->registerEngines([
                '.volt' => function() use ($view, $dependencyInjector) {
                    $volt = new Volt($view, $dependencyInjector);
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
