<?php

require_once "./Model/Fut.php";

class FutController{
    private $model;

    public function __construct($conn) {
        $this->model = new Fut($conn);
    }
    function insert ($name){
        $this->model->insertFut($name);
    }
    function show(){
        $this->model->fetch();
    }
}