<?php
namespace Dldh\Models;
class Pole extends \Phalcon\Mvc\Model
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
     * @Column(column="name", type="string", length=200, nullable=true)
     */
    protected $name;

    /**
     *
     * @var integer
     * @Column(column="place_id", type="integer", length=11, nullable=true)
     */
    protected $place_id;

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
     * @var double
     * @Column(column="wlat", type="double", length=16, nullable=true)
     */
    protected $wlat;

    /**
     *
     * @var double
     * @Column(column="wlng", type="double", length=16, nullable=true)
     */
    protected $wlng;

    /**
     *
     * @var string
     * @Column(column="head", type="string", length=200, nullable=true)
     */
    protected $head;

    /**
     *
     * @var integer
     * @Column(column="worker_id", type="integer", length=10, nullable=true)
     */
    protected $worker_id;

    /**
     *
     * @var integer
     * @Column(column="state", type="integer", length=2, nullable=false)
     */
    protected $state;

    /**
     *
     * @var string
     * @Column(column="address", type="string", length=200, nullable=true)
     */
    protected $address;

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
     * Method to set the value of field place_id
     *
     * @param integer $place_id
     * @return $this
     */
    public function setPlaceId($place_id)
    {
        $this->place_id = $place_id;

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
     * Method to set the value of field wlat
     *
     * @param double $wlat
     * @return $this
     */
    public function setWlat($wlat)
    {
        $this->wlat = $wlat;

        return $this;
    }

    /**
     * Method to set the value of field wlng
     *
     * @param double $wlng
     * @return $this
     */
    public function setWlng($wlng)
    {
        $this->wlng = $wlng;

        return $this;
    }

    /**
     * Method to set the value of field head
     *
     * @param string $head
     * @return $this
     */
    public function setHead($head)
    {
        $this->head = $head;

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
     * Method to set the value of field address
     *
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

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
     * Returns the value of field place_id
     *
     * @return integer
     */
    public function getPlaceId()
    {
        return $this->place_id;
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
     * Returns the value of field wlat
     *
     * @return double
     */
    public function getWlat()
    {
        return $this->wlat;
    }

    /**
     * Returns the value of field wlng
     *
     * @return double
     */
    public function getWlng()
    {
        return $this->wlng;
    }

    /**
     * Returns the value of field head
     *
     * @return string
     */
    public function getHead()
    {
        return $this->head;
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
     * Returns the value of field state
     *
     * @return integer
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Returns the value of field address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("dldh");
        $this->setSource("pole");
        $this->hasMany('id', 'PoleComplain', 'pole_id', ['alias' => 'PoleComplain']);
        $this->hasMany('id', 'PoleError', 'pole_id', ['alias' => 'PoleError']);
        $this->hasMany('id', 'PoleNavHelp', 'pole_id', ['alias' => 'PoleNavHelp']);
        $this->hasMany('id', 'PoleNavLog', 'pole_id', ['alias' => 'PoleNavLog']);
        $this->hasMany('id', 'PoleWarn', 'pole_id', ['alias' => 'PoleWarn']);
        $this->hasMany('id', 'WorkerPole', 'pole_id', ['alias' => 'WorkerPole']);
        $this->belongsTo('place_id', '\Area', 'id', ['alias' => 'Area']);
        $this->belongsTo('worker_id', '\Worker', 'id', ['alias' => 'Worker']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pole';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pole[]|Pole|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pole|\Phalcon\Mvc\Model\ResultInterface
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
            'name' => 'name',
            'place_id' => 'place_id',
            'lng' => 'lng',
            'lat' => 'lat',
            'wlat' => 'wlat',
            'wlng' => 'wlng',
            'head' => 'head',
            'worker_id' => 'worker_id',
            'state' => 'state',
            'address' => 'address'
        ];
    }

}
