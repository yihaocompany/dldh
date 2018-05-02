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


    public function  createsignAction(){
        date_default_timezone_set ("Asia/Chongqing");
        $y=date("Y");
        $m=date("m");
        $d=date("d");
        $stringdata=$y."-".$m."-".$d;
        $workercount=\Dldh\Models\Worker::count();
        $count=\Dldh\Models\WorkerSignBack::count('dateflag="'.$stringdata.'"');
        if($count==0){
            $workerlist=\Dldh\Models\Worker::find();
            $this->db->begin();
            foreach ($workerlist as $item){
                $worksign=new \Dldh\Models\WorkerSignBack();
                $worksign->setDateFlag($stringdata);
                $worksign->setWorkerId($item->getId());
                $worksign->setCreatAt(0);
                $worksign->setType(1);
                $worksign->save();
                $worksign1=new \Dldh\Models\WorkerSignBack();
                $worksign1->setDateFlag($stringdata);
                $worksign1->setWorkerId($item->getId());
                $worksign1->setCreatAt(0);
                $worksign1->setType(0);
                $worksign1->save();
            }
            $this->db->commit();
        }else{
            if($workercount!=($count/2)){
                $workerlist=\Dldh\Models\Worker::find();
                $this->db->begin();
                foreach ($workerlist as $item){
                    $singrecord=\Dldh\Models\WorkerSignBack::find("dateflag='".$stringdata."' and worker_id=".$item->getId());
                    if(!$singrecord){
                        $worksign=new \Dldh\Models\WorkerSignBack();
                        $worksign->setDateFlag($stringdata);
                        $worksign->setWorkerId($item->getId());
                        $worksign->setCreatAt(time());
                        $worksign->setType(1);
                        $worksign->save();
                        $worksign=new \Dldh\Models\WorkerSignBack();
                        $worksign->setDateFlag($stringdata);
                        $worksign->setWorkerId($item->getId());
                        $worksign->setCreatAt(time());
                        $worksign->setType(0);
                        $worksign->save();
                    }
                }
                $this->db->commit();
            }
        }

        $profiles= $this->di->get('profiler')->getProfiles();
//遍历输出
        foreach($profiles as  $profile) {
            echo
            "SQL语句: ", $profile->getSQLStatement(), "\n";
            echo
            "开始时间: ", $profile->getInitialTime(), "\n";
            echo
            "结束时间: ", $profile->getFinalTime(), "\n";
            echo
            "消耗时间: ", $profile->getTotalElapsedSeconds(), "\n";
        }

//直接获取最后一条sql语句
        echo $this->di->get('profiler')->getLastProfile()->getSQLStatement();


        $this->view->disable();

    }
}

