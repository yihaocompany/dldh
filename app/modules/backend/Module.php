<?php
namespace Dldh\Modules\Backend;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();
        $loader->registerNamespaces([
            'Dldh\Modules\Backend\Controllers' => __DIR__ . '/controllers/',
            'Dldh\Models' => APP_PATH . '/common/models/',
            'Dldh\Helpers' =>   APP_PATH . '/common/helpers/',
        ]);

        $loader->register();
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        /**
         * Setting up the view component
         */
        $di->set('view', function () {
            $view = new View();
            $view->setDI($this);
            $view->setViewsDir(__DIR__ . '/views/');
            $view->registerEngines([
                '.volt' => function ($view) {
                    $volt = new VoltEngine($view, $this);
                    $volt->setOptions([
                        'compiledPath' => __DIR__ . '/../../../cache/volt/',
                        'compiledSeparator' => '_'
                    ]);
                    return $volt;
                }
            ]);
            return $view;
        });
    }
}
