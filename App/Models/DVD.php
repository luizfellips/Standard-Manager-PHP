<?php

namespace App\Models;

class DVD extends Product implements \JsonSerializable{
    
    private $size;

    public function __construct($id = null,$name,$description,$product_type,$size){
        parent::__construct($id,$name,$description,$product_type);
        $this->size = $size;
    }
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
    public function getSize(){
        return $this->size;
    }

}