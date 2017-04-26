<?php

class Cart extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $stt;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $masp;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $userID;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $soluong;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
//        $this->setSchema("quanaonam.com");
        $this->belongsTo('masp', '\Product', 'MaQuanAo', ['alias' => 'Product']);
        $this->belongsTo('userID', '\User', 'userID', ['alias' => 'User']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cart';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cart[]|Cart
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cart
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
