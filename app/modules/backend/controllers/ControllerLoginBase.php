<?php

namespace Dldh\Modules\Backend\Controllers;


class ControllerLoginBase extends ControllerBase
{
    public function initialize(){
        parent::initialize();
        if(!$this->session->get('admin')){
            $this -> flashSession -> error(  '登陆失败 '  );
            $this->response->redirect( '/backend/admin/login' );

        }else{
            $this->view->setVar('Admin',$this->session->get('admin'));
        }
    }


}

