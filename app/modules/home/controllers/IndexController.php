<?php

namespace Dldh\Modules\Home\Controllers;
use Phalcon\Mvc\View;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
    }
    public function noteAction()
    {
        exit('note');

    }
    public function helpAction()
    {

        exit('help');
    }
}

