<?php

class Product extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $MaQuanAo;

    /**
     *
     * @var string
     * @Column(type="string", length=30, nullable=false)
     */
    public $TenQuanao;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $Gia;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $color;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    public $sizes;

    /**
     *
     * @var string
     * @Column(type="string", length=300, nullable=false)
     */
    public $chuthich;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $image;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
//        $this->setSchema("quanaonam.com");
        $this->hasMany('MaQuanAo', 'Giohang', 'masp', ['alias' => 'Giohang']);
        $this->hasMany('MaQuanAo', 'ListShow', 'MaQuanAo', ['alias' => 'ListShow']);
        $this->hasMany('MaQuanAo', 'OrderDetail', 'product_id', ['alias' => 'OrderDetail']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'product';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Product[]|Product
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Product
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
