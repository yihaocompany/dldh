<?php

namespace Dldh\Models;

class NoticeWorker extends Zmodelbase
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
     * @Column(column="notice_id", type="integer", length=20, nullable=false)
     */
    protected $notice_id;

    /**
     *
     * @var integer
     * @Column(column="worker_id", type="integer", length=10, nullable=false)
     */
    protected $worker_id;

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
     * Method to set the value of field notice_id
     *
     * @param integer $notice_id
     * @return $this
     */
    public function setNoticeId($notice_id)
    {
        $this->notice_id = $notice_id;

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
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field notice_id
     *
     * @return integer
     */
    public function getNoticeId()
    {
        return $this->notice_id;
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
     * Initialize method for model.
     */
    public function initialize()
    {

        $this->setSource("notice_worker");
        $this->belongsTo('worker_id', 'Dldh\Models\Worker', 'id', ['alias' => 'Worker']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'notice_worker';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NoticeWorker[]|NoticeWorker|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NoticeWorker|\Phalcon\Mvc\Model\ResultInterface
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
            'notice_id' => 'notice_id',
            'worker_id' => 'worker_id'
        ];
    }

}
