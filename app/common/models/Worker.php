<?php

namespace Dldh\Models;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class Worker extends Zmodelbase
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
     * @Column(column="username", type="string", length=20, nullable=true)
     */
    protected $username;

    /**
     *
     * @var string
     * @Column(column="password", type="string", length=100, nullable=true)
     */
    protected $password;

    /**
     *
     * @var string
     * @Column(column="realname", type="string", length=50, nullable=true)
     */
    protected $realname;

    /**
     *
     * @var string
     * @Column(column="head", type="string", length=100, nullable=true)
     */
    protected $head;

    /**
     *
     * @var string
     * @Column(column="phone", type="string", length=20, nullable=true)
     */
    protected $phone;

    /**
     *
     * @var string
     * @Column(column="email", type="string", length=20, nullable=true)
     */
    protected $email;

    /**
     *
     * @var string
     * @Column(column="weixin", type="string", length=20, nullable=true)
     */
    protected $weixin;

    /**
     *
     * @var string
     * @Column(column="qq", type="string", length=20, nullable=true)
     */
    protected $qq;

    /**
     *
     * @var string
     * @Column(column="token", type="string", length=100, nullable=true)
     */
    protected $token;

    /**
     *
     * @var integer
     * @Column(column="token_at", type="integer", length=10, nullable=true)
     */
    protected $token_at;

    /**
     *
     * @var integer
     * @Column(column="status", type="integer", length=1, nullable=false)
     */
    protected $status;

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
     * Method to set the value of field username
     *
     * @param string $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Method to set the value of field realname
     *
     * @param string $realname
     * @return $this
     */
    public function setRealname($realname)
    {
        $this->realname = $realname;
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
     * Method to set the value of field phone
     *
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Method to set the value of field weixin
     *
     * @param string $weixin
     * @return $this
     */
    public function setWeixin($weixin)
    {
        $this->weixin = $weixin;
        return $this;
    }

    /**
     * Method to set the value of field qq
     *
     * @param string $qq
     * @return $this
     */
    public function setQq($qq)
    {
        $this->qq = $qq;

        return $this;
    }

    /**
     * Method to set the value of field token
     *
     * @param string $token
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Method to set the value of field token_at
     *
     * @param integer $token_at
     * @return $this
     */
    public function setTokenAt($token_at)
    {
        $this->token_at = $token_at;
        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param integer $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
     * Returns the value of field username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the value of field realname
     *
     * @return string
     */
    public function getRealname()
    {
        return $this->realname;
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
     * Returns the value of field phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field weixin
     *
     * @return string
     */
    public function getWeixin()
    {
        return $this->weixin;
    }

    /**
     * Returns the value of field qq
     *
     * @return string
     */
    public function getQq(){
        return $this->qq;
    }

    /**
     * Returns the value of field token
     *
     * @return string
     */
    public function getToken(){
        return $this->token;
    }

    /**
     * Returns the value of field token_at
     *
     * @return integer
     */
    public function getTokenAt(){
        return $this->token_at;
    }

    /**
     * Returns the value of field status
     *
     * @return integer
     */
    public function getStatus(){
        return $this->status;
    }

    /**
     * Validations and business logic
     *
     * @return boolean
     */
  /*  public function validation(){
        $validator = new Validation();
        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );
        return $this->validate($validator);
    }*/

    /**
     * Initialize method for model.
     */
    public function initialize(){
        $this->setSource("worker");
        $this->hasMany('id', 'Dldh\Models\AuthGroupAccess', 'uid', ['alias' => 'AuthGroupAccess']);
        $this->hasMany('id', 'Dldh\Models\Notice', 'worker_id', ['alias' => 'Notice']);
        $this->hasMany('id', 'Dldh\Models\NoticeCommit', 'worker_id', ['alias' => 'NoticeCommit']);
        $this->hasMany('id', 'Dldh\Models\Pole', 'worker_id', ['alias' => 'Pole']);
        $this->hasMany('id', 'Dldh\Models\PoleComplain', 'worker_id', ['alias' => 'PoleComplain']);
        $this->hasMany('id', 'Dldh\Models\PoleError', 'worker_id', ['alias' => 'PoleError']);
        $this->hasMany('id', 'Dldh\Models\PoleNavLog', 'worker_id', ['alias' => 'PoleNavLog']);
        $this->hasMany('id', 'Dldh\Models\PoleWarn', 'worker_id', ['alias' => 'PoleWarn']);
        $this->hasMany('id', 'Dldh\Models\WorkerPointLog', 'worker_id', ['alias' => 'WorkerPointLog']);
        $this->hasMany('id', 'Dldh\Models\WorkerPole', 'worker_id', ['alias' => 'WorkerPole']);
        $this->hasMany('id', 'Dldh\Models\WorkerSignBack', 'worker_id', ['alias' => 'WorkerSign']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Worker[]|Worker|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null){
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Worker|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null){
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
            'username' => 'username',
            'password' => 'password',
            'realname' => 'realname',
            'head' => 'head',
            'phone' => 'phone',
            'email' => 'email',
            'weixin' => 'weixin',
            'qq' => 'qq',
            'token' => 'token',
            'token_at' => 'token_at',
            'status' => 'status'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'worker';
    }

}
