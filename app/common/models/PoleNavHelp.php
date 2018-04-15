<?php
namespace Dldh\Models;
class PoleNavHelp extends \Phalcon\Mvc\Model
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
     * @Column(column="pic", type="string", length=100, nullable=true)
     */
    protected $pic;

    /**
     *
     * @var string
     * @Column(column="notice", type="string", length=500, nullable=true)
     */
    protected $notice;

    /**
     *
     * @var integer
     * @Column(column="user_id", type="integer", length=11, nullable=true)
     */
    protected $user_id;

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
     * Method to set the value of field user_id
     *
     * @param integer $user_id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

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
     * Returns the value of field pic
     *
     * @return string
     */
    public function getPic()
    {
        return $this->pic;
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
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("dldh");
        $this->setSource("pole_nav_help");
        $this->belongsTo('pole_id', '\Pole', 'id', ['alias' => 'Pole']);
        $this->belongsTo('user_id', '\User', 'id', ['alias' => 'User']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pole_nav_help';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PoleNavHelp[]|PoleNavHelp|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PoleNavHelp|\Phalcon\Mvc\Model\ResultInterface
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
            'pic' => 'pic',
            'notice' => 'notice',
            'user_id' => 'user_id'
        ];
    }

}
