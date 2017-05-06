<?php

use Phalcon\Validation;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;

class User extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $userID;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $username;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $password;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    public $sodienthoai;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $DiaChi;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $HovaTen;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    public $ngaysinh;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    public $gioitinh;

    /**
     *
     * @var string
     * @Column(type="string", length=1000, nullable=true)
     */
    public $avatar;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $email;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $idfb;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
//    public function validation()
//    {
//        $validator = new Validation();
//
//        $validator->add(
//            'email',
//            new EmailValidator(
//                [
//                    'model'   => $this,
//                    'message' => 'Please enter a correct email address',
//                ]
//            )
//        );
//
//        return $this->validate($validator);
//    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
//        $this->setSchema("quanaonam.com");
        $this->hasMany('userID', 'Cart', 'userID', ['alias' => 'Cart']);
        $this->hasMany('userID', 'Orders', 'user_id', ['alias' => 'Orders']);
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
     * @return User[]|User
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return User
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
