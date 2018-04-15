<?php
namespace Dldh\Models;
class PoleWarn extends \Phalcon\Mvc\Model
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
     * @Column(column="pole_id", type="integer", length=10, nullable=true)
     */
    protected $pole_id;

    /**
     *
     * @var string
     * @Column(column="notice", type="string", nullable=true)
     */
    protected $notice;

    /**
     *
     * @var integer
     * @Column(column="warnsecond_id", type="integer", length=10, nullable=false)
     */
    protected $warnsecond_id;

    /**
     *
     * @var integer
     * @Column(column="create_at", type="integer", length=10, nullable=true)
     */
    protected $create_at;

    /**
     *
     * @var integer
     * @Column(column="worker_id", type="integer", length=11, nullable=true)
     */
    protected $worker_id;

    /**
     *
     * @var string
     * @Column(column="pic", type="string", length=500, nullable=true)
     */
    protected $pic;

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
     * Method to set the value of field notice
     *
     * @param string $notice
     * @return $this
     */
    public function setNotice($notice)
    {
        $this->notice = $notice;

        return $this;
    }

    /**
     * Method to set the value of field warnsecond_id
     *
     * @param integer $warnsecond_id
     * @return $this
     */
    public function setWarnsecondId($warnsecond_id)
    {
        $this->warnsecond_id = $warnsecond_id;

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
     * Method to set the value of field pic
     *
     * @param string $pic
     * @return $this
     */
    public function setPic($pic)
    {
        $this->pic = $pic;

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
     * Returns the value of field notice
     *
     * @return string
     */
    public function getNotice()
    {
        return $this->notice;
    }

    /**
     * Returns the value of field warnsecond_id
     *
     * @return integer
     */
    public function getWarnsecondId()
    {
        return $this->warnsecond_id;
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
     * Returns the value of field pic
     *
     * @return string
     */
    public function getPic()
    {
        return $this->pic;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("dldh");
        $this->setSource("pole_warn");
        $this->belongsTo('pole_id', '\Pole', 'id', ['alias' => 'Pole']);
        $this->belongsTo('worker_id', '\Worker', 'id', ['alias' => 'Worker']);
        $this->belongsTo('warnsecond_id', '\Warnsecond', 'id', ['alias' => 'Warnsecond']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pole_warn';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PoleWarn[]|PoleWarn|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PoleWarn|\Phalcon\Mvc\Model\ResultInterface
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
            'notice' => 'notice',
            'warnsecond_id' => 'warnsecond_id',
            'create_at' => 'create_at',
            'worker_id' => 'worker_id',
            'pic' => 'pic'
        ];
    }

}
