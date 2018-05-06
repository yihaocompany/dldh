<?php
namespace Dldh\Models;
class Zmodelbase extends  \Phalcon\Mvc\Model{
    protected $_cache;
    public function initialize(){
        $this->_cache=  \Phalcon\Di::getDefault()->getShared('cache');
        self::setup(array(
            'notNullValidations' => false
        ));
    }
}