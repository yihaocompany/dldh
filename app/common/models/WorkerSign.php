<?php
namespace Dldh\Models;
class WorkerSign extends Zmodelbase
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
     * @Column(column="worker_id", type="integer", length=10, nullable=true)
     */
    protected $worker_id;

    /**
     *
     * @var integer
     * @Column(column="type", type="integer", length=1, nullable=true)
     */
    protected $type;

    /**
     *
     * @var integer
     * @Column(column="creat_at", type="integer", length=10, nullable=true)
     */
    protected $creat_at;

    /**
     *
     * @var integer
     * @Column(column="worker_point_log_id", type="integer", length=11, nullable=true)
     */
    protected $worker_point_log_id;

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
     * Method to set the value of field type
     *
     * @param integer $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Method to set the value of field creat_at
     *
     * @param integer $creat_at
     * @return $this
     */
    public function setCreatAt($creat_at)
    {
        $this->creat_at = $creat_at;

        return $this;
    }

    /**
     * Method to set the value of field worker_point_log_id
     *
     * @param integer $worker_point_log_id
     * @return $this
     */
    public function setWorkerPointLogId($worker_point_log_id)
    {
        $this->worker_point_log_id = $worker_point_log_id;

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
     * Returns the value of field type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the value of field creat_at
     *
     * @return integer
     */
    public function getCreatAt()
    {
        return $this->creat_at;
    }

    /**
     * Returns the value of field worker_point_log_id
     *
     * @return integer
     */
    public function getWorkerPointLogId()
    {
        return $this->worker_point_log_id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("dldh");
        $this->setSource("worker_sign");
        $this->belongsTo('worker_id', '\Worker', 'id', ['alias' => 'Worker']);
        $this->belongsTo('worker_point_log_id', '\WorkerPointLog', 'id', ['alias' => 'WorkerPointLog']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'worker_sign';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WorkerSign[]|WorkerSign|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WorkerSign|\Phalcon\Mvc\Model\ResultInterface
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
            'type' => 'type',
            'creat_at' => 'creat_at',
            'worker_point_log_id' => 'worker_point_log_id'
        ];
    }

}
