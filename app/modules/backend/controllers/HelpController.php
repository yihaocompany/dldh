<?php

namespace Dldh\Modules\Backend\Controllers;

class HelpController extends ControllerLoginBase
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
        $totalRows=\Dldh\Models\Help::count(array(
            $conditions,
            "bind" => $parameters));
        $totalPage=ceil($totalRows/$limit);
        $listpage=$page>=$totalPage?0:$totalPage;
        $dispalayPage=4;
        $endpage=($page+$dispalayPage)>=$totalPage?$totalPage:($page+$dispalayPage);
        $prepage=$page==1?0:$page-1;
        $nextpage=$page>=$totalPage?0:$page+1;
        $first=$page>1?1:0;
        $list =\Dldh\Models\Help::find(array(
            $conditions,
            "bind" => $parameters,
            'limit' => array('number' => $limit, 'offset' => $offset) ));
        $page_r=[];
        for ($x=$page; $x<=$endpage; $x++) {
            $page_r[] =$x;
        }
        $page_rang=$page_r;
        $this->view->setVars(
            array(
                'Helpcategory'=>\Dldh\Models\Helpcategory::find(),
                'list'=>$list,
                'totalrows'=>$totalRows,
                'pager'=>$page_rang,
                'current'=>$page,
                'first'=>$first,
                'last'=>$listpage,
                'pre'=>$prepage,
                'next'=>$nextpage,
                'url'=>"/backend/help/index/?search=".$search.'&page=',
            )
        );

    }


    public function updatecategoryAction(){
        try{
            if($this->request->getPost()){
                $d=$this->request->getPost();

                if(count($d)>=2){
                    if($d['id']>0){
                        $conditions="id<>:id: and name=:name:";
                        $parameters=array("id"=>$d['id'],'name'=>$d['name']);
                        if(\Dldh\Models\Helpcategory::findFirst([$conditions,'bind'=>$parameters])){
                            exit($this->ajax_return('类名重复','0'));
                        }
                        $record= \Dldh\Models\Helpcategory::findFirst('id='.$d['id']);
                        if($record){
                            $record->setName($d['name']);
                            $return=$record->save();
                            if($return){
                                exit($this->ajax_return('修改成功','1'));
                            }else{
                                exit($this->ajax_return('修改失败','0'));
                            }
                        }else{
                            exit($this->ajax_return('无此记录','0'));
                        }
                    }else{

                        $conditions=" name=:name:";
                        $parameters=array('name'=>$d['name']);
                        if(\Dldh\Models\Helpcategory::findFirst([$conditions,'bind'=>$parameters])){
                            exit($this->ajax_return('类名重复','0'));
                        }
                        $onlyname=new \Dldh\Models\Helpcategory();
                        $onlyname->setName($d['name']);
                        $return=$onlyname->save();
                        if($return){
                            exit($this->ajax_return('修改成功','1'));
                        }else{
                            $error="";
                            $messages = $onlyname->getMessages();
                            foreach ($messages as $message) {
                                $error.=$message .", ";
                            }
                            exit($this->ajax_return( $error,0 ));
                        }
                    }
                }else{
                    exit($this->ajax_return('请求参数错','0'));
                }
            }else{
                exit($this->ajax_return('非法请求','0'));
            }
        }catch (\Exception $e){
            exit($this->ajax_return('发生错误','0'));
        }
    }


    public function categoryAction()
    {
        $page =intval($this->request->get('page'));
        $limit =3;
        $page = $page > 0 ? $page: 1 ;
        $offset = ($page - 1) * $limit;
        $search=trim($this->request->get('search'));
        $conditions = " name like  :search:";
        $parameters = array(
            'search' =>'%'.$search.'%',
        );
        $totalRows=\Dldh\Models\Helpcategory::count(array(
            $conditions,
            "bind" => $parameters));
        $totalPage=ceil($totalRows/$limit);
        $listpage=$page>=$totalPage?0:$totalPage;
        $dispalayPage=4;
        $endpage=($page+$dispalayPage)>=$totalPage?$totalPage:($page+$dispalayPage);
        $prepage=$page==1?0:$page-1;
        $nextpage=$page>=$totalPage?0:$page+1;
        $first=$page>1?1:0;
        $list =\Dldh\Models\Helpcategory::find(array(
            $conditions,
            "bind" => $parameters,
            'limit' => array('number' => $limit, 'offset' => $offset) ))->toArray();

        $page_r=[];
        for ($x=$page; $x<=$endpage; $x++) {
            $page_r[] =$x;
        }
        $page_rang=$page_r;
        $this->view->setVars(
            array(
                'list'=>$list,
                'totalrows'=>$totalRows,
                'pager'=>$page_rang,
                'current'=>$page,
                'first'=>$first,
                'last'=>$listpage,
                'pre'=>$prepage,
                'next'=>$nextpage,
                'url'=>"/backend/help/category/?search=".$search.'&page=',
            )
        );

    }
}

