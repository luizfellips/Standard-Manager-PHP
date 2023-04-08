<?php

namespace App\Models;

abstract class Product{
    protected $id;
    protected $name;
    protected $description;
    protected $product_type;

    public function __construct($id = null,$name,$description,$product_type)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->product_type = $product_type;
    }


    

	function getId() { 
 		return $this->id; 
	} 



	function getName() { 
 		return $this->name; 
	} 

	function getDescription() { 
 		return $this->description; 
	} 

	function getProducttype() { 
 		return $this->product_type; 
	} 

	
}
