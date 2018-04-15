<?php
namespace Dldh\Models;
class WorkerPole extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(column="worker_id", type="integer", length=11, nullable=true)
     */
    protected $worker_id;

    /**
     *
     * @var integer
     * @Column(column="pole_id", type="integer", length=11, nullable=true)
     */
    protected $pole_id;

    /**
     *
     * @var integer
     * @Column(column="state", type="integer", length=1, nullable=true)
     */
    protected $state;

    /**
     *
     * @var integer
     * @Column(column="create_at", type="integer", length=11, nullable=false)
     */
    protected $create_at;

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
     * Method to set the value of field state
     *
     * @param integer $state
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

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
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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
     * Returns the value of field pole_id
     *
     * @return integer
     */
    public function getPoleId()
    {
        return $this->pole_id;
    }

    /**
     * Returns the value of field state
     *
     * @return integer
     */
    public function getState()
    {
        return $this->state;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("dldh");
        $this->setSource("worker_pole");
        $this->belongsTo('worker_id', '\Worker', 'id', ['alias' => 'Worker']);
        $this->belongsTo('pole_id', '\Pole', 'id', ['alias' => 'Pole']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'worker_pole';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WorkerPole[]|WorkerPole|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WorkerPole|\Phalcon\Mvc\Model\ResultInterface
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
            'worker_id' => 'worker_id',
            'pole_id' => 'pole_id',
            'state' => 'state',
            'create_at' => 'create_at'
        ];
    }

}
