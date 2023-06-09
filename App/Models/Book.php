<?php

namespace App\Models;

class Book extends Product implements \JsonSerializable{
    
    private $author;
    private $genre;

    public function __construct($id = null,$name,$description,$product_type,$author,$genre){
        parent::__construct($id,$name,$description,$product_type);
        $this->author = $author;
        $this->genre = $genre;
    }
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getGenre(){
        return $this->genre;
    }
}