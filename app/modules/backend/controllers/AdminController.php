<?php

namespace Dldh\Modules\Backend\Controllers;
use Phalcon\Mvc\View;

class AdminController extends ControllerBase
{

    public function indexAction()
    {

    }
    public function loginAction(){

        $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);

    }

    public function validatecodeAction(){
        $_vc = new \Dldh\Models\ValidateCode();  //实例化一个对象
        $_vc->doimg();
        $this->session->set('back_code', $_vc->getCode());
        exit;

    }
}

