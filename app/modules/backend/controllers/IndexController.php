<?php
namespace Dldh\Modules\Backend\Controllers;
class IndexController extends ControllerLoginBase
{
    public function indexAction(){
    }

    /**
     * 退出登陆
     * 王海滨
     */
    public function loginoutAction(){
        $this->session->destroy();
       /* return $this->dispatcher->forward(
            [
                'controller' => 'admin',
                'action'     => 'login',
            ]
        );*/

       $this->response->redirect("/backend/admin/login");
    }

    /**
     * 设置
     */

    public function configAction(){
    }

    /**
     * 管理员例表
     */

    public function adminlistAction(){
    }
    /**
     * 增加管理员例表
     */
    public function addadminlistAction(){
    }
    /**
     * 修改管理员例表
     */
    public function modiadminlistAction(){
    }
}

