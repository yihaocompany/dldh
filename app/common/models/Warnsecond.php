<?php
namespace Dldh\Models;
class Warnsecond extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=11, nullable=false)
     */
    protected $id;

    /**
     *
     * @var integer
     * @Column(column="warnfirst_id", type="integer", length=11, nullable=true)
     */
    protected $warnfirst_id;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     *
     * @var integer
     * @Column(column="orderid", type="integer", length=11, nullable=false)
     */
    protected $orderid;

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
     * Method to set the value of field warnfirst_id
     *
     * @param integer $warnfirst_id
     * @return $this
     */
    public function setWarnfirstId($warnfirst_id)
    {
        $this->warnfirst_id = $warnfirst_id;

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
     * Method to set the value of field orderid
     *
     * @param integer $orderid
     * @return $this
     */
    public function setOrderid($orderid)
    {
        $this->orderid = $orderid;

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
     * Returns the value of field warnfirst_id
     *
     * @return integer
     */
    public function getWarnfirstId()
    {
        return $this->warnfirst_id;
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
     * Returns the value of field orderid
     *
     * @return integer
     */
    public function getOrderid()
    {
        return $this->orderid;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("dldh");
        $this->setSource("warnsecond");
        $this->hasMany('id', 'PoleWarn', 'warnsecond_id', ['alias' => 'PoleWarn']);
        $this->belongsTo('warnfirst_id', '\Warnfirst', 'id', ['alias' => 'Warnfirst']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'warnsecond';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Warnsecond[]|Warnsecond|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Warnsecond|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
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
            'warnfirst_id' => 'warnfirst_id',
            'name' => 'name',
            'orderid' => 'orderid'
        ];
    }

}
