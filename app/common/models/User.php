<?php
namespace Dldh\Models;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class User extends Zmodelbase
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
     * @Column(column="username", type="string", length=180, nullable=false)
     */
    protected $username;


    /**
     *
     * @var string
     * @Column(column="head", type="string", length=100, nullable=true)
     */
    protected $head;


    /**
     *
     * @var string
     * @Column(column="email", type="string", length=180, nullable=false)
     */
    protected $email;

    /**
     *
     * @var integer
     * @Column(column="enabled", type="integer", length=1, nullable=false)
     */
    protected $enabled;

    /**
     *
     * @var string
     * @Column(column="salt", type="string", length=255, nullable=true)
     */
    protected $salt;

    /**
     *
     * @var string
     * @Column(column="password", type="string", length=255, nullable=false)
     */
    protected $password;

    /**
     *
     * @var string
     * @Column(column="last_login", type="string", nullable=true)
     */
    protected $last_login;

    /**
     *
     * @var string
     * @Column(column="confirmation_token", type="string", length=180, nullable=true)
     */
    protected $confirmation_token;

    /**
     *
     * @var string
     * @Column(column="password_requested_at", type="string", nullable=true)
     */
    protected $password_requested_at;

    /**
     *
     * @var string
     * @Column(column="roles", type="string", nullable=false)
     */
    protected $roles;

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
     * Method to set the value of field enabled
     *
     * @param integer $enabled
     * @return $this
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * Method to set the value of field salt
     *
     * @param string $salt
     * @return $this
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

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
     * Method to set the value of field last_login
     *
     * @param string $last_login
     * @return $this
     */
    public function setLastLogin($last_login)
    {
        $this->last_login = $last_login;

        return $this;
    }

    /**
     * Method to set the value of field confirmation_token
     *
     * @param string $confirmation_token
     * @return $this
     */
    public function setConfirmationToken($confirmation_token)
    {
        $this->confirmation_token = $confirmation_token;

        return $this;
    }

    /**
     * Method to set the value of field password_requested_at
     *
     * @param string $password_requested_at
     * @return $this
     */
    public function setPasswordRequestedAt($password_requested_at)
    {
        $this->password_requested_at = $password_requested_at;

        return $this;
    }

    /**
     * Method to set the value of field roles
     *
     * @param string $roles
     * @return $this
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

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
     * Returns the value of field head
     *
     * @return string
     */
    public function getHead()
    {
        return $this->head;
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
     * Returns the value of field enabled
     *
     * @return integer
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Returns the value of field salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
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
     * Returns the value of field last_login
     *
     * @return string
     */
    public function getLastLogin()
    {
        return $this->last_login;
    }

    /**
     * Returns the value of field confirmation_token
     *
     * @return string
     */
    public function getConfirmationToken()
    {
        return $this->confirmation_token;
    }

    /**
     * Returns the value of field password_requested_at
     *
     * @return string
     */
    public function getPasswordRequestedAt()
    {
        return $this->password_requested_at;
    }

    /**
     * Returns the value of field roles
     *
     * @return string
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();
        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => '请输入正确的Email',
                ]
            )
        );
        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {

        $this->setSource("user");
        $this->skipAttributes(array('email', 'password','head'));

        //Skips only when inserting
       // $this->skipAttributesOnCreate(array('created_at'));

        //Skips only when updating
       // $this->skipAttributesOnUpdate(array('email'));
        $this->hasMany('id', 'Dldh\Models\Help', 'user_id', ['alias' => 'Help']);
        $this->hasMany('id', 'Dldh\Models\Notice', 'user_id', ['alias' => 'Notice']);
        $this->hasMany('id', 'Dldh\Models\PoleNavHelp', 'user_id', ['alias' => 'PoleNavHelp']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return User[]|User|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return User|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }


    public function beforeValidation()
    {
        $this->skipValidation(['email']);
    }
    public function skipValidation($skipers=[])
    {
        foreach ($skipers as $skiper) {
            if (empty($this->skiper)) {
                $this->skiper = new \Phalcon\Db\RawValue('""');
            }
        }
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
            'head' => 'head',
            'email' => 'email',
            'enabled' => 'enabled',
            'salt' => 'salt',
            'head'=>'head',
            'password' => 'password',
            'last_login' => 'last_login',
            'confirmation_token' => 'confirmation_token',
            'password_requested_at' => 'password_requested_at',
            'roles' => 'roles'
        ];
    }

}
