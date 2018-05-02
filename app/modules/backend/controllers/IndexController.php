<?php
namespace Dldh\Modules\Backend\Controllers;
class IndexController extends ControllerLoginBase
{
    public function indexAction(){
  /*      var_dump($this->session->get('admin'));
        exit;*/

        $this->view->setVars(array('workerscount'=>\Dldh\Models\Worker::count(),
            'polecount'=>\Dldh\Models\Pole::count(),
            'noticecount'=>\Dldh\Models\Notice::count(),
            'warncount'=>\Dldh\Models\PoleWarn::count(),
            'helpcount'=>\Dldh\Models\Help::count(),
            'signcount'=>\Dldh\Models\WorkerSignBack::count()));

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

