<?php

namespace Dldh\Modules\Backend\Controllers;
use Phalcon\Mvc\View;
use Dldh\Helpers\PaginatorHelper;
use Phalcon\Mvc\Model\Manager;
use Dldh\Models\Pole as Pole;
use Dldh\Models\Worker as Worker;
use  Dldh\Models\Area  as Area;
class PoleController extends ControllerLoginBase
{

    /**
     *塔杆例表
     */
    public function indexAction()
    {
   /*     $list=$this->modelsManager->createQuery('SELECT a.id as id, a.name as name, b.realname as realname ,c.area_name as area_name,a.address as address
                                                 ,a.lat as lat, a.lng as lng
                                                FROM  \Dldh\Models\Pole as a ,\Dldh\Models\Worker as b , \Dldh\Models\Area as c  where c.id=a.place_id  and  a.worker_id=b.id');
        $list  = $list->execute();*/
        $list=new \Dldh\Models\Pole();
        $list=$list->find();
   /*     var_dump($list->getWorker()->toArray());
        var_dump($list->getArea()->toArray());
        var_dump($list->getPoleComplain()->toArray());
        var_dump($list->getPoleError()->toArray());
        var_dump($list->getPoleNavHelp()->toArray());
        var_dump($list->getPoleNavLog()->toArray());
        var_dump($list->getPoleWarn()->toArray());
        var_dump($list->getWorkerPole()->toArray());
        exit;*/
        $this->view->setVar('list',$list);
    }


    /**
     *塔杆例表
     */

    public function adminlistAction(){
    }
    /**
     * 增加塔杆
     */
    public function addadminlistAction(){
    }


    /**
     * 修改塔杆
     */
    public function modiadminlistAction(){
    }
}

