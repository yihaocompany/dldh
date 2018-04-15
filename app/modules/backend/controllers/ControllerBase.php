<?php
namespace Dldh\Modules\Backend\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

class ControllerBase extends Controller
{
    public $_config=array();
    public function initialize(){
            $config=new \Dldh\Models\Config();
            $list=$config->find()->toArray();
            foreach ($list as $item){
                $this->_config[$item]=$item['value'];
            }
        $this->view->setVar('_config', $this->_config);
    }

}
