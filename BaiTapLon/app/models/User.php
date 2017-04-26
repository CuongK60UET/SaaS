<?php

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
     * @Column(type="string", length=20, nullable=false)
     */
    public $sodienthoai;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=false)
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
     * @Column(type="string", length=20, nullable=false)
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
     * @Column(type="string", length=200, nullable=false)
     */
    public $avatar;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
//        $this->setSchema("quanaonam.com");
        $this->hasMany('userID', 'Giohang', 'userID', ['alias' => 'Giohang']);
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
