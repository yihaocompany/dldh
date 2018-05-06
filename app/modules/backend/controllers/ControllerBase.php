<?php
namespace Dldh\Modules\Backend\Controllers;
use Phalcon\Mvc\Controller;


class ControllerBase extends Controller
{
    public $_config=array();
    public function initialize(){
         $config=new \Dldh\Models\Config();
         $list=$config->getconfig();
         foreach ($list as $item){
         $this->_config[$item['name']]=$item['value'];
         }
        $this->view->setVar('_config', $this->_config);
    }

    /**
     * ajax输出
     * @param string or array $message
     * @param int $code
     * @param array $data
     * @author whb
     */
    protected function ajax_return($message, $code=1, array $data=array()){
        if(is_array($message)){
            $result = array(
                'code' => $message['code'],
                'message' => $message['message'],
                'data' =>  $message['data'],
            );
        }else{
            $result = array(
                'code' => $code,
                'message' => $message,
                'data' => $data,
            );
        }
        $this -> response -> setJsonContent($result);
        $this -> response -> send();
    }


    /**
     * exception日志记录
     * @param \Exception $e
     * @author whb
     */
    protected function write_exception_log(\Exception $e){
        $logArray = array(
            'file' => $e -> getFile(),
            'line' => $e -> getLine(),
            'code' => $e -> getCode(),
            'message' => $e -> getMessage(),
            'trace' => $e -> getTraceAsString(),
        );
        $this -> logger -> write_log($logArray);
    }
    /**
     * exception日志记录
     * @param \Exception $e
     * @author whb
     */
protected function Modelupdate($model,$arry,$mykey=0){
        try{
            if($arry[$mykey]>0){
                $conditions=$mykey.'=:id:';
                $parameter=array('id'=>$arry[$mykey]);
                $model=$model->findFirst([$conditions,'bind'=>$parameter]);
                if($model){
                    foreach ($arry as $key=>$value){
                        if($key!='id'){
                            $model->$key=$value;
                        }
                    }
                    if($model->save()){
                        $this->ajax_return('更新成功',1,$model->toArray());
                    }else{
                        $this->ajax_return('更新失败',0);
                    }
                }else{
                    $this->ajax_return('数据错误',0);
                }
            }else{
                $model=new $model;
                foreach ($arry as $key=>$value){
                    $model->$key=$value;
                }
                if($model->save()){
                    $this->ajax_return('增加成功',1,$model->toArray());
                }else{
                    $this->ajax_return('增加失败',0);
                }
            }
        }catch (\Exception $e){
            $this->ajax_return('发生错误',0);
        }


}

}
