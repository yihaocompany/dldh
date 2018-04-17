<?php
namespace Dldh\Models;
class PoleNavLog extends Zmodelbase
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
     * @Column(column="pole_id", type="integer", length=11, nullable=true)
     */
    protected $pole_id;

    /**
     *
     * @var integer
     * @Column(column="worker_id", type="integer", length=11, nullable=true)
     */
    protected $worker_id;

    /**
     *
     * @var integer
     * @Column(column="create_at", type="integer", length=11, nullable=true)
     */
    protected $create_at;

    /**
     *
     * @var integer
     * @Column(column="end_at", type="integer", length=11, nullable=true)
     */
    protected $end_at;

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
     * Method to set the value of field pole_id
     *
     * @param integer $pole_id
     * @return $this
     */
    public function setPoleId($pole_id)
    {
        $this->pole_id = $pole_id;

        return $this;
    }

    /**
     * Method to set the value of field worker_id
     *
     * @param integer $worker_id
     * @return $this
     */
    public function setWorkerId($worker_id)
    {
        $this->worker_id = $worker_id;

        return $this;
    }

    /**
     * Method to set the value of field create_at
     *
     * @param integer $create_at
     * @return $this
     */
    public function setCreateAt($create_at)
    {
        $this->create_at = $create_at;

        return $this;
    }

    /**
     * Method to set the value of field end_at
     *
     * @param integer $end_at
     * @return $this
     */
    public function setEndAt($end_at)
    {
        $this->end_at = $end_at;

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
     * Returns the value of field pole_id
     *
     * @return integer
     */
    public function getPoleId()
    {
        return $this->pole_id;
    }

    /**
     * Returns the value of field worker_id
     *
     * @return integer
     */
    public function getWorkerId()
    {
        return $this->worker_id;
    }

    /**
     * Returns the value of field create_at
     *
     * @return integer
     */
    public function getCreateAt()
    {
        return $this->create_at;
    }

    /**
     * Returns the value of field end_at
     *
     * @return integer
     */
    public function getEndAt()
    {
        return $this->end_at;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("dldh");
        $this->setSource("pole_nav_log");
        $this->belongsTo('pole_id', '\Pole', 'id', ['alias' => 'Pole']);
        $this->belongsTo('worker_id', '\Worker', 'id', ['alias' => 'Worker']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pole_nav_log';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PoleNavLog[]|PoleNavLog|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PoleNavLog|\Phalcon\Mvc\Model\ResultInterface
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
            'pole_id' => 'pole_id',
            'worker_id' => 'worker_id',
            'create_at' => 'create_at',
            'end_at' => 'end_at'
        ];
    }

}
