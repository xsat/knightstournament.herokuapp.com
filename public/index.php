<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

try {
    require_once __DIR__. '/../vendor/autoload.php';
    echo (new \Common\Application())->main();
} catch (Exception $e) {
    echo '<pre>', $e->getMessage(), "\n" , $e->getTraceAsString(), '</pre>';
}
