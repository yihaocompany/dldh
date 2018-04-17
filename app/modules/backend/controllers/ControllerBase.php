<?php
namespace Dldh\Modules\Backend\Controllers;
use Phalcon\Mvc\Controller;


class ControllerBase extends Controller
{
    public $_config=array();
    public function initialize(){
            $config=new \Dldh\Models\Config();
            $list=$config->find()->toArray();
            foreach ($list as $item){
                $this->_config[$item['name']]=$item['value'];
            }
        $this->view->setVar('_config', $this->_config);
    }


    /**
     * ajax输出
     * @param $message
     * @param int $code
     * @param array $data
     * @author whb
     */
    protected function ajax_return($message, $code=1, array $data=array()){
        $result = array(
            'code' => $code,
            'message' => $message,
            'data' => $data,
        );
        //$this -> response -> setContent(json_encode($result));
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

}
