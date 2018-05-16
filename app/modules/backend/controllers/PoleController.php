<?php

namespace Dldh\Modules\Backend\Controllers;
use Phalcon\Mvc\View;
use Dldh\Helpers\PaginatorHelper;
use Phalcon\Mvc\Model\Manager;
use Dldh\Models\Pole as Pole;
use Dldh\Models\Worker as Worker;
use Dldh\Models\Area  as Area;
use Phalcon\Mvc\Model\Query\Builder as QueryBuilder;


class PoleController extends ControllerLoginBase
{
    public function indexAction()
    {
   /* $list=$this->modelsManager->createQuery('SELECT a.id as id, a.name as name, b.realname as realname ,c.area_name as area_name,a.address as address
       ,a.lat as lat, a.lng as lng
       FROM  \Dldh\Models\Pole as a ,\Dldh\Models\Worker as b , \Dldh\Models\Area as c  where c.id=a.place_id  and  a.worker_id=b.id');
       $list  = $list->execute();*/
       // $list=new \Dldh\Models\Pole();
       // $list=$list->find();
   /*     var_dump($list->getWorker()->toArray());
        var_dump($list->getArea()->toArray());
        var_dump($list->getPoleComplain()->toArray());
        var_dump($list->getPoleError()->toArray());
        var_dump($list->getPoleNavHelp()->toArray());
        var_dump($list->getPoleNavLog()->toArray());
        var_dump($list->getPoleWarn()->toArray());
        var_dump($list->getWorkerPole()->toArray());
        exit;*/
       // $this->view->setVar('list',$list);



       // $builder = new QueryBuilder();
        //确定查询表
      //  $builder -> from(['poles'=>'\Dldh\Models\Pole']);
        //关联表
      //  $builder -> innerJoin('Dldh\Models\Worker', 'poles.worker_id = workers.id','workers');
      //  $builder -> innerJoin('Dldh\Models\Area', 'area.id = poles.area_id','area');
        // 需要查询的字段，这里两个表的字段都可以
      //  $builder -> columns([
      //      'poles.id',
      //      'poles.id',
      //      'area.area_name',
      //      'count(parts.id) as count',  //当数据很大时，统计数据时用
      //  ]);
        // where条件
     //   $builder -> where('parts.id = :id:',array('id' =>1));
        // andWhere
      //  $builder -> andWhere('robots.name = :name:',array('name' => '你好'));


       /* //执行搜索
        if (isset($params['conditions'])) {
            foreach ($params['conditions'] as $field => $val) {
                if (!preg_match('/^\s*$/', $val)) {
                    //执行模糊搜索
                    $builder->andWhere("providers.$field like :$field:", array($field => '%' . trim($val) . '%'));
                }
            }
        }*/
        // 设置limit条件，order什么的都可以往后加$builder->order()
      //  $builder->limit(5,5);
        // $builder->limit($rows, ($currentPage - 1) * $rows);    注意:这里的limit条件和原始sql语句中的limit语句刚好相反

        //获取查询对象
       // $query = $builder->getQuery();
        //执行并返回结果
       // $result = $query->execute();
      //  var_dump($result -> toArray());die;
      //  $this->view->setVar('list',$list);
    }

    public  function getpagerAction(){
        $page =intval($this->request->get('page'));
        $limit =10;
        $page = $page > 0 ? $page: 1 ;
        $offset = ($page - 1) * $limit;
        $search=trim($this->request->get('search'));
        $conditions = " name like  :search:   or    address like  :search:";
        $parameters = array(
            'search' =>'%'.$search.'%',
        );
        $totalRows=\Dldh\Models\Pole::count(array(
            $conditions,
            "bind" => $parameters));
        $totalPage=ceil($totalRows/$limit);
        $listpage=$page>=$totalPage?0:$totalPage;
        $dispalayPage=4;//
        $endpage=($page+$dispalayPage)>=$totalPage?$totalPage:($page+$dispalayPage);
        $prepage=$page==1?0:$page-1;
        $nextpage=$page>=$totalPage?0:$page+1;
        $first=$page>1?1:0;
        $list =\Dldh\Models\Pole::find(array(
            $conditions,
            "bind" => $parameters,
            'limit' => array('number' => $limit, 'offset' => $offset) ));
        $arr=[];
        foreach ($list as $item){
            $arr[]   = ['id'=>$item->getId(),
                'name' => $item->getName(),
                'lat' => $item->getLat(),
                'lng' => $item->getLng(),
                'worker_realname' => $item->Worker->realname,
                'area_name' => $item->Area->area_name,
                'address' => $item->getAddress()  ];
        }
        $page_r=null;
        for ($x=$page; $x<=$endpage; $x++) {
            $page_r[] =$x;
        }
       $page_rang=$page_r;
        echo $this->ajax_return( 1,1,array('list'=>$arr,'pagedetail'=>array('totalpage'=>$totalPage,
            'totalrows'=>$totalRows,'pager'=>$page_rang,'current'=>$page,'first'=>$first,'last'=>$listpage,'pre'=>$prepage,'next'=>$nextpage)));
        exit;
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

    public function mapAction(){
        $pole_list=\Dldh\Models\Pole::find();
        $list = $pole_list->toArray();
       // var_dump($list);exit;
        $this->view->setVars(array('list'=>$list));
    }
}

