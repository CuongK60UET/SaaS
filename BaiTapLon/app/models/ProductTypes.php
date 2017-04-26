<?php

class ProductTypes extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $MaLoai;

    /**
     *
     * @var string
     * @Column(type="string", length=40, nullable=false)
     */
    public $TenLoaisp;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
//        $this->setSchema("quanaonam.com");
        $this->hasMany('MaLoai', 'ListShow', 'MaLoai', ['alias' => 'ListShow']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'product_types';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ProductTypes[]|ProductTypes
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ProductTypes
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
