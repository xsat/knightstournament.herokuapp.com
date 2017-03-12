<?php

namespace Common;

use PDO;
use Phalcon\Loader;
use Dotenv\Dotenv;
use Frontend\Router;
use Phalcon\Mvc\Url;
use Phalcon\DI\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Mvc\Application as PhalconApplication;
use Phalcon\Session\Adapter\Files as SessionFiles;
use Phalcon\Mvc\Model\Metadata\Files as MetadataFiles;

/**
 * Class Application
 * @package Common
 */
class Application extends PhalconApplication
{
    protected function registerAutoloaders()
    {
        $env = new Dotenv(__DIR__ . '/../../../');
        $env->load();

        $loader = new Loader();
        $loader->registerNamespaces([
            __NAMESPACE__ =>  __DIR__ . '/../libraries/',
            __NAMESPACE__ . '\Models' => __DIR__ . '/../models/',
            __NAMESPACE__ . '\Traits' => __DIR__ . '/../traits/',
            'Frontend' => __DIR__ . '/../../frontend/components/',
        ]);
        $loader->register();
    }

    protected function registerServices()
    {
        $di = new FactoryDefault();
        $di->set('router', function() {
            return new Router();
        }, true);
        $di->set('url', function() {
            return new Url();
        }, true);
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
     * @return string
     */
    public function main()
    {
        $this->registerAutoloaders();
        $this->registerServices();
        $this->registerModules([
            'frontend' => [
                'className' => 'Frontend\Module',
                'path' => __DIR__ . '/../../frontend/components/Module.php',
            ],
        ]);

        return $this->compressContent($this->handle()->getContent());
    }

    /**
     * @param string $content
     * @return string
     */
    private function compressContent($content)
    {
        $search = ['/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s', '/>(\s)+</', '/\n/', '/\r/', '/\t/'];
        $replace = ['>', '<', '\\1', '> <', '', '', ''];

        return preg_replace($search, $replace, $content);
    }
}
