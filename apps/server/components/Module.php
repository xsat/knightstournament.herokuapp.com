<?php

namespace Server;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\DiInterface;
use Phalcon\Cli\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\Model\Metadata\Files as MetadataFiles;

/**
 * Class Module
 * @package Server
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
            __NAMESPACE__ . '\Tasks' => __DIR__ . '/../tasks/',
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
            $dispatcher->setDefaultNamespace(__NAMESPACE__ . '\Tasks');
            return $dispatcher;
        }, true);
        $dependencyInjector->set('modelsMetadata', function() {
            return new MetadataFiles([
                'metaDataDir' => __DIR__ . '/../cache/models/',
            ]);
        }, true);
        $dependencyInjector->set('router', function() {
            return new Router();
        }, true);
    }
}
