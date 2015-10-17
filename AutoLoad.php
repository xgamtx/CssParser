<?php

function autoload($className)
{
    define('APP_ROOT', dirname(__FILE__));

    $className = ltrim($className, '\\');
    $fileName  = APP_ROOT . '/code' . DIRECTORY_SEPARATOR;
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    if (file_exists($fileName)) {
        require $fileName;
    }
}
spl_autoload_register('autoload');

include_once('vendor/autoload.php');