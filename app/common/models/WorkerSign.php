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
     * @var string
     * @Column(column="dateflag", type="string", length=30, nullable=false)
     */
    protected $dateflag;

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
     *
     * @var string
     * @Column(column="begininfo", type="string", length=200, nullable=true)
     */
    protected $begininfo;

    /**
     *
     * @var string
     * @Column(column="endinfo", type="string", length=200, nullable=true)
     */
    protected $endinfo;

    /**
     *
     * @var integer
     * @Column(column="beginlate", type="integer", length=1, nullable=true)
     */
    protected $beginlate;

    /**
     *
     * @var integer
     * @Column(column="endlate", type="integer", length=1, nullable=true)
     */
    protected $endlate;

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
     * Method to set the value of field dateflag
     *
     * @param string $dateflag
     * @return $this
     */
    public function setDateflag($dateflag)
    {
        $this->dateflag = $dateflag;

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
     * Method to set the value of field begininfo
     *
     * @param string $begininfo
     * @return $this
     */
    public function setBegininfo($begininfo)
    {
        $this->begininfo = $begininfo;

        return $this;
    }

    /**
     * Method to set the value of field endinfo
     *
     * @param string $endinfo
     * @return $this
     */
    public function setEndinfo($endinfo)
    {
        $this->endinfo = $endinfo;

        return $this;
    }

    /**
     * Method to set the value of field beginlate
     *
     * @param integer $beginlate
     * @return $this
     */
    public function setBeginlate($beginlate)
    {
        $this->beginlate = $beginlate;

        return $this;
    }

    /**
     * Method to set the value of field endlate
     *
     * @param integer $endlate
     * @return $this
     */
    public function setEndlate($endlate)
    {
        $this->endlate = $endlate;

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
     * Returns the value of field dateflag
     *
     * @return string
     */
    public function getDateflag()
    {
        return $this->dateflag;
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
     * Returns the value of field begininfo
     *
     * @return string
     */
    public function getBegininfo()
    {
        return $this->begininfo;
    }

    /**
     * Returns the value of field endinfo
     *
     * @return string
     */
    public function getEndinfo()
    {
        return $this->endinfo;
    }

    /**
     * Returns the value of field beginlate
     *
     * @return integer
     */
    public function getBeginlate()
    {
        return $this->beginlate;
    }

    /**
     * Returns the value of field endlate
     *
     * @return integer
     */
    public function getEndlate()
    {
        return $this->endlate;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {

        $this->setSource("worker_sign");
        $this->belongsTo('worker_id', 'Dldh\Models\Worker', 'id', ['alias' => 'Worker']);
        $this->belongsTo('worker_point_log_id', 'Dldh\Models\WorkerPointLog', 'id', ['alias' => 'WorkerPointLog']);
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
            'dateflag' => 'dateflag',
            'type' => 'type',
            'creat_at' => 'creat_at',
            'worker_point_log_id' => 'worker_point_log_id',
            'begininfo' => 'begininfo',
            'endinfo' => 'endinfo',
            'beginlate' => 'beginlate',
            'endlate' => 'endlate'
        ];
    }

}
