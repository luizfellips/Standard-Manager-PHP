<?php

namespace App\Models;

class Furniture extends Product{
    
    private $height;
    private $width;
    private $length;

    public function __construct($id = null,$name,$description,$product_type,$height,$width,$length){
        parent::__construct($id,$name,$description,$product_type);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    

	function getHeight() { 
 		return $this->height; 
	} 

	function getWidth() { 
 		return $this->width; 
	} 

	function getLength() { 
 		return $this->length; 
	} 
}