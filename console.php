<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

try {
    require_once __DIR__. '/vendor/autoload.php';
    (new \Common\Console())->main($argv);
} catch (Exception $e) {
    echo $e->getMessage(), "\n" , $e->getTraceAsString();
}
