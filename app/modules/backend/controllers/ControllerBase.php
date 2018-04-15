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

}
