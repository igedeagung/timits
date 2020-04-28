<?php

$loader = new \Phalcon\Loader();
$loader->registerNamespaces([
    'Phalcon\Db' => APP_PATH . '/lib/Phalcon/Db',
    'App\Forms'  => APP_PATH .'/forms/',
]);
/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
)->register();
