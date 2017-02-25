<?php

namespace Common;

use PDO;
use Dotenv\Dotenv;
use Phalcon\Loader;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\DI\FactoryDefault\CLI;
use Phalcon\CLI\Console as PhalconConsole;
use Phalcon\Session\Adapter\Files as SessionFiles;
use Phalcon\Mvc\Model\Metadata\Files as MetadataFiles;

class Console extends PhalconConsole
{
    protected function registerAutoloaders()
    {
        $env = new Dotenv(__DIR__ . '/../../../');
        $env->load();

        $loader = new Loader();
        $loader->registerNamespaces([
            'Server' => __DIR__ . '/../../server/components/',
        ]);
        $loader->register();
    }

    protected function registerServices()
    {
        $di = new CLI();
        $di->set('db', function() {
            return new Mysql([
                'host' => getenv('DB_HOST'),
                'username' => getenv('DB_USERNAME'),
                'password' => getenv('DB_PASSWORD'),
                'dbname' => getenv('DB_DATABASE'),
                'options' => [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                ],
            ]);
        }, true);
        $di->set('session', function() {
            $session = new SessionFiles();
            $session->start();
            return $session;
        }, true);
        $di->set('modelsMetadata', function() {
            return new MetadataFiles([
                'metaDataDir' => __DIR__ . '/../cache/models/',
            ]);
        }, true);

        $this->setDI($di);
    }

    /**
     * @param array $argv
     */
    public function main(array $argv)
    {
        $this->registerAutoloaders();
        $this->registerServices();
        $this->registerModules([
            'server' => [
                'className' => 'Server\Module',
                'path' => __DIR__ . '/../../server/components/Module.php',
            ],
        ]);
        $this->setDefaultModule('server');
        $this->handle($this->parseArguments($argv));
    }

    /**
     * @param array $argv
     * @return array
     */
    private function parseArguments(array $argv)
    {
        $arguments = [];

        array_shift($argv);

        foreach ($argv as $k => $arg) {
            $values = explode('=', $arg);
            if (isset($values[0]) && isset($values[1])) {
                $arguments['params'][$values[0]] = $values[1];
            } elseif (empty($arguments['task'])) {
                $arguments['task'] = $arg;
            } elseif (empty($arguments['action'])) {
                $arguments['action'] = $arg;
            } else {
                $arguments['params'][] = $arg;
            }
        }

        return $arguments;
    }
}
