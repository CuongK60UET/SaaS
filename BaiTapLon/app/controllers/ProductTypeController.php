<?php

class ProductTypeController extends ControllerBase {
    public function initialize(){
        parent::initialize();
    }
    public function loaispAction(){
        $this->view->loai = ProductTypes :: find();
    }

}