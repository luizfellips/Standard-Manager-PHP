<?php

namespace App\Entity;

use Module\Database;

class DBBook {
	public static function register(Book $book, $book_id){
		$db = new Database('book');
		$db->insert([
			'id' => $book_id,
			'name' => $book->getName(),
			'description' => $book->getDescription(),
			'author' => $book->getAuthor(),
            'genre' => $book->getGenre()
		]);

		return true;
	}
	
	public static function delete(){

	}
	public static function update(){

	}
	public static function getProduct(int $id){

	} 
	public static function getProducts($where = null, $order = null, $limit = null){
		
	} 
}