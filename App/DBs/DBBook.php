<?php

namespace App\DBs;

use Module\Database;
use App\Models\Book;

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
		$productData = (new Database('book'))->select('id = ' . $id)->fetch();
		return new Book($productData['id'],$productData['name'],$productData['description'],$productData['product_type'],$productData['author'], $productData['genre']);

	} 
	public static function getProducts($where = null, $order = null, $limit = null){
		
	} 
}