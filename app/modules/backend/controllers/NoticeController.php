<?php

namespace Dldh\Modules\Backend\Controllers;

class NoticeController extends ControllerLoginBase
{

    public function indexAction()
    {
        $page =intval($this->request->get('page'));
        $limit =3;
        $page = $page > 0 ? $page: 1 ;
        $offset = ($page - 1) * $limit;
        $search=trim($this->request->get('search'));
        $conditions = " title like  :search: or  brief like  :search: ";
        $parameters = array(
            'search' =>'%'.$search.'%',
        );
        $totalRows=\Dldh\Models\PoleWarn::count(array(
            $conditions,
            "bind" => $parameters));
        $totalPage=ceil($totalRows/$limit);
        $listpage=$page>=$totalPage?0:$totalPage;
        $dispalayPage=4;
        $endpage=($page+$dispalayPage)>=$totalPage?$totalPage:($page+$dispalayPage);
        $prepage=$page==1?0:$page-1;
        $nextpage=$page>=$totalPage?0:$page+1;
        $first=$page>1?1:0;
        $list =\Dldh\Models\PoleWarn::find(array(
            $conditions,
            "bind" => $parameters,
            'limit' => array('number' => $limit, 'offset' => $offset) ));
        $page_r=[];
        for ($x=$page; $x<=$endpage; $x++) {
            $page_r[] =[ $x=>'?page='.$x.'&search='.$search];
        }
        $page_rang=$page_r;
        $this->view->setVars(
            array(

                'list'        =>$list,
                'totalrows'   =>$totalRows,
                'pager'       =>$page_rang,
                'current'     =>$page,
                'first'       =>$first,
                'last'        =>$listpage,
                'pre'         =>$prepage,
                'next'        =>$nextpage,
                'url'         =>"/backend/help/index/"
            )
        );
    }

}

