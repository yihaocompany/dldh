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
    'Dldh\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Dldh\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
