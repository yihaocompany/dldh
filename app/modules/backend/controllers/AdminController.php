<?php

namespace Dldh\Modules\Backend\Controllers;
use Phalcon\Mvc\View;


class AdminController extends ControllerBase
{
    public function initialize(){
        parent::initialize();
        if($this->session->get('admin')){
            $this->response->redirect('/backend/index/index');
        }
    }

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
            if($user){
                $this -> flashSession -> success(  '登陆成功 ' . $user->username );
                $this->session->set('admin',array('adminname'=>$user->getUsername(),'email'=>$user->email));
              $this->response->redirect("/backend/index/index");
            }else{
                $this -> flashSession -> error(  '登陆失败 ' . $user->username );
                $this->response->redirect("/backend/admin/login");
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
         if ($this->request->isPost()){
            $username =   $this->request->getPost('username','striptags');
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

                $this->session->set('admin',$user->toArray());
                $this->flash->success('登陆成功');
                $this ->response->redirect('/backend/index/index');
            }else{
                $this->flash->error("用户名或密码错");
                $this ->response->redirect('/backend/admin/login');
            }
         }else{
             $this->flash->error("非法请求");
         }
        }catch(\Exception $e){
            $this -> write_exception_log($e);
            $this->flash->error($e->getMessages());
            return $this -> response -> redirect('/404');
        }

    }


    public function validatecodeAction(){
        $this->view->disable();
        try {
        $_vc = new \Dldh\Models\ValidateCode();  //实例化一个对象
        $_vc->doimg();
        $this->session->set('back_code', $_vc->getCode());

        }catch(\Exception $e){
            $this -> write_exception_log($e);

        }
    }
}

