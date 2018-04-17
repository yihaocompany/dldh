<?php
namespace Dldh\Models;
class Config extends \Dldh\Models\Zmodelbase
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=10, nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=30, nullable=false)
     */
    protected $name;

    /**
     *
     * @var string
     * @Column(column="value", type="string", length=300, nullable=true)
     */
    protected $value;

    /**
     *
     * @var string
     * @Column(column="txt", type="string", length=30, nullable=true)
     */
    protected $txt;

    /**
     *
     * @var string
     * @Column(column="hiden", type="integer", length=1, nullable=true)
     */

    protected  $hidden;


    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field value
     *
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Method to set the value of field txt
     *
     * @param string $txt
     * @return $this
     */
    public function setTxt($txt)
    {
        $this->txt = $txt;

        return $this;
    }


    /**
     * Method to set the value of field id
     *
     * @param integer $hidden
     * @return $this
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;

        return $this;
    }



    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns the value of field txt
     *
     * @return string
     */
    public function getHidden()
    {
        return $this->hidden;
    }


    /**
     * Returns the value of field txt
     *
     * @return integer
     */
    public function getTxt()
    {
        return $this->txt;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();
        $this->setSource("config");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'config';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Config[]|Config|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Config|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * 保存在缓存中
     * @return array
     */
    public function getconfig(){
        $data = $this->_cache->get("config");
        if($data){
            return $data ;
        }
        $config=parent::find()->toArray();
        $this->_cache->save("config",$config );
        return $config;
    }
    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'id' => 'id',
            'name' => 'name',
            'value' => 'value',
            'txt' => 'txt',
            'hidden' => 'hidden'
        ];
    }

}
