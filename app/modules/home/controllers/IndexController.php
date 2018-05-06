<?php

namespace Dldh\Modules\Home\Controllers;
use Phalcon\Mvc\View;

class IndexController extends ControllerBase
{

    public function indexAction()
    {   /*date_default_timezone_set ("Asia/Chongqing");
        echo date('d');
        exit;*/
      /*  echo date('Y-m-d H:i:s');
        echo "\n";
        echo strtotime(date('Y-m-d H:i:s'));
        exit;*/
        $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
    }
    public function noteAction()
    {
        exit('note');

    }
    public function helpAction()
    {

        exit('help');
    }


    public function uploadAction(){

        if($_POST){
            $imgtype = array('gif'=>'gif', 'png'=>'png', 'jpg'=>'jpeg', 'jpeg'=>'jpeg');
            //图片类型在传输过程中对应的头信息
            $message = $_POST['message'];
            //接收以base64编码的图片数据
            $filename =  $_POST['filename'];
            //接收文件名称
            $ftype  = $_POST['filetype'];
            $path   = isset($_POST['head'])?$_POST['head']:$_POST['addid'];
            $worker = isset($_POST['worker'])?$_POST['worker']:$_POST['addid'];
            //接收文件类型
            //首先将头信息去掉，然后解码剩余的base64编码的数据
            $message = base64_decode(substr($message,strlen('data:image/'.$imgtype[strtolower($ftype)].';base64,')));
            $filename = $filename.".".$ftype;
            $furl = BASE_PATH . '/public/upload'.$path;
            //开始写文件
            $newfilename=time().$worker.".".$ftype;
            $file = fopen($furl.$newfilename,"w");

           // @rename($furl.$filename,$furl.$newfilename);
            if(fwrite($file,$message) === false){
                exit($this->ajax_return('失败......','0'));
            }
            exit($this->ajax_return('上传成功','1',array('picurl'=>"/upload".$path.$newfilename)));
        }
        exit;

    }
}

