<?php
namespace Dldh\Models;
class Help extends Zmodelbase
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
     * @Column(column="type", type="integer", length=1, nullable=true)
     */
    protected $type;

    /**
     *
     * @var string
     * @Column(column="title", type="string", length=300, nullable=true)
     */
    protected $title;

    /**
     *
     * @var string
     * @Column(column="brief", type="string", nullable=true)
     */
    protected $brief;

    /**
     *
     * @var string
     * @Column(column="url", type="string", length=300, nullable=true)
     */
    protected $url;

    /**
     *
     * @var integer
     * @Column(column="user_id", type="integer", length=10, nullable=true)
     */
    protected $user_id;

    /**
     *
     * @var string
     * @Column(column="pic", type="string", length=200, nullable=true)
     */
    protected $pic;

    /**
     *
     * @var integer
     * @Column(column="helpcategory_id", type="integer", length=11, nullable=true)
     */
    protected $helpcategory_id;

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
     * Method to set the value of field title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Method to set the value of field brief
     *
     * @param string $brief
     * @return $this
     */
    public function setBrief($brief)
    {
        $this->brief = $brief;

        return $this;
    }

    /**
     * Method to set the value of field url
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

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
     * Method to set the value of field helpcategory_id
     *
     * @param integer $helpcategory_id
     * @return $this
     */
    public function setHelpcategoryId($helpcategory_id)
    {
        $this->helpcategory_id = $helpcategory_id;

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
     * Returns the value of field type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the value of field title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Returns the value of field brief
     *
     * @return string
     */
    public function getBrief()
    {
        return $this->brief;
    }

    /**
     * Returns the value of field url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
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
     * Returns the value of field pic
     *
     * @return string
     */
    public function getPic()
    {
        return $this->pic;
    }

    /**
     * Returns the value of field helpcategory_id
     *
     * @return integer
     */
    public function getHelpcategoryId()
    {
        return $this->helpcategory_id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("dldh");
        $this->setSource("help");
        $this->belongsTo('helpcategory_id', '\Helpcategory', 'id', ['alias' => 'Helpcategory']);
        $this->belongsTo('user_id', '\User', 'id', ['alias' => 'User']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'help';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Help[]|Help|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Help|\Phalcon\Mvc\Model\ResultInterface
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
            'type' => 'type',
            'title' => 'title',
            'brief' => 'brief',
            'url' => 'url',
            'user_id' => 'user_id',
            'pic' => 'pic',
            'helpcategory_id' => 'helpcategory_id'
        ];
    }

}
