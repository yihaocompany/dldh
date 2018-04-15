<?php
namespace Dldh\Models;
class WorkerPointLog extends \Phalcon\Mvc\Model
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
     * @var double
     * @Column(column="lng", type="double", length=16, nullable=true)
     */
    protected $lng;

    /**
     *
     * @var double
     * @Column(column="lat", type="double", length=16, nullable=true)
     */
    protected $lat;

    /**
     *
     * @var integer
     * @Column(column="create_at", type="integer", length=11, nullable=true)
     */
    protected $create_at;

    /**
     *
     * @var integer
     * @Column(column="worker_id", type="integer", length=11, nullable=true)
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
     * Method to set the value of field lng
     *
     * @param double $lng
     * @return $this
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Method to set the value of field lat
     *
     * @param double $lat
     * @return $this
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

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
     * Returns the value of field lng
     *
     * @return double
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Returns the value of field lat
     *
     * @return double
     */
    public function getLat()
    {
        return $this->lat;
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
        $this->setSchema("dldh");
        $this->setSource("worker_point_log");
        $this->hasMany('id', 'WorkerSign', 'worker_point_log_id', ['alias' => 'WorkerSign']);
        $this->belongsTo('worker_id', '\Worker', 'id', ['alias' => 'Worker']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'worker_point_log';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WorkerPointLog[]|WorkerPointLog|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WorkerPointLog|\Phalcon\Mvc\Model\ResultInterface
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
            'lng' => 'lng',
            'lat' => 'lat',
            'create_at' => 'create_at',
            'worker_id' => 'worker_id'
        ];
    }

}
