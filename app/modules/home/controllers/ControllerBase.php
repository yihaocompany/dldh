<?php
namespace Dldh\Modules\Home\Controllers;

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
        $this -> response -> setJsonContent($result);
        $this -> response -> send();
    }

}
