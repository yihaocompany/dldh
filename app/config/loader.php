<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Dldh\Models' => APP_PATH . '/common/models/',
    'Dldh'        => APP_PATH . '/common/library/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Dldh\Modules\Home\Module'     => APP_PATH . '/modules/home/Module.php',
    'Dldh\Modules\Backend\Module'  => APP_PATH . '/modules/backend/Module.php',
    'Dldh\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
