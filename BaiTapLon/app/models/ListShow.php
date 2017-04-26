<?php

class ListShow extends \Phalcon\Mvc\Model
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
    public $MaQuanAo;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $MaLoai;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
//        $this->setSchema("quanaonam.com");
        $this->belongsTo('MaQuanAo', '\Quanao', 'MaQuanAo', ['alias' => 'Quanao']);
        $this->belongsTo('MaLoai', '\LoaiSanpham', 'MaLoai', ['alias' => 'LoaiSanpham']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'list_show';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ListShow[]|ListShow
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ListShow
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
