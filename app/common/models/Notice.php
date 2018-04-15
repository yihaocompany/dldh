<?php
namespace Dldh\Models;
class Notice extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=20, nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Column(column="title", type="string", length=100, nullable=false)
     */
    protected $title;

    /**
     *
     * @var string
     * @Column(column="content", type="string", nullable=false)
     */
    protected $content;

    /**
     *
     * @var integer
     * @Column(column="user_id", type="integer", length=11, nullable=true)
     */
    protected $user_id;

    /**
     *
     * @var string
     * @Column(column="created_at", type="string", nullable=false)
     */
    protected $created_at;

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
     * Method to set the value of field content
     *
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

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
     * Method to set the value of field created_at
     *
     * @param string $created_at
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

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
     * Returns the value of field title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Returns the value of field content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
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
     * Returns the value of field created_at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
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
        $this->setSource("notice");
        $this->hasMany('id', 'NoticeCommit', 'notice_id', ['alias' => 'NoticeCommit']);
        $this->belongsTo('user_id', '\User', 'id', ['alias' => 'User']);
        $this->belongsTo('worker_id', '\Worker', 'id', ['alias' => 'Worker']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'notice';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Notice[]|Notice|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Notice|\Phalcon\Mvc\Model\ResultInterface
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
            'title' => 'title',
            'content' => 'content',
            'user_id' => 'user_id',
            'created_at' => 'created_at',
            'worker_id' => 'worker_id'
        ];
    }

}
