<?php

namespace Dldh\Modules\Backend\Controllers;
use Phalcon\Mvc\View;

class AdminController extends ControllerBase
{

    public function indexAction(){
        try {
            $username =   $this->request->getPost('username');
            $password =   $this->request->getPost('password');
            $usermode = new \Dldh\Models\User();
            $conditions = " username = :user: and  password = :pass:";
            $parameters = array(
                'user' => $username,
                'pass' => md5($password)
            );
            $user      = $usermode->findFirst(array(
                $conditions,
                "bind" => $parameters
            ));



           // echo $this->di->get('profiler')->getLastProfile()->getSQLStatement();




            if($user){
                $this -> flashSession -> success(  '登陆成功 ' . $user->username );
                return $this->dispatcher->forward(
                    [
                        'controller' => 'index',
                        'action'     => 'index',
                    ]
                );

            }else{

                $this -> flashSession -> error(  '登陆失败 ' . $user->username );
                return $this->dispatcher->forward(
                    [
                        'controller' => 'admin',
                        'action'     => 'login',
                    ]
                );
            }

        }catch(\Exception $e){
            $this -> write_exception_log($e);
            $this -> flashSession -> error($e -> getMessage());
            return $this -> response -> redirect('/404');
        }

    }
    public function loginAction(){
        $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
    }
    public function veryloginAction(){
        try {
            $username =   $this->request->getPost('username');
            $password =   $this->request->getPost('password');
            $user = new \Dldh\Models\User();
            $conditions = "username = :username: AND password = :password:";
            $parameters = array(
                'username' => $username,
                'password' => md5($password)
            );

            $user=$user->findFirst(array(
                $conditions,
                "bind" => $parameters
            ));
            if($user){
                $this->flash->success('登陆成功');
                $this -> response -> redirect('/backend/admin/index');
            }

        }catch(\Exception $e){
            $this -> write_exception_log($e);
            return $this -> response -> redirect('/404');
        }
    }


    public function validatecodeAction(){
        $_vc = new \Dldh\Models\ValidateCode();  //实例化一个对象
        $_vc->doimg();
        $this->session->set('back_code', $_vc->getCode());
        exit;

    }
}

