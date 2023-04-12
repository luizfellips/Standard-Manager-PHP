<?php

namespace App\DBs;

use Module\Database;
use App\Models\Book;
use \PDO;

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
	
	public static function delete(Book $book){
		return (new Database('book'))->delete('id = '.$book->getId());
	}
	public static function update(Book $book){
		return (new Database('book'))->update('id = '.$book->getId(),[
			'name' => $book->getName(),
			'description' => $book->getDescription(),
			'author' => $book->getAuthor(),
			'genre' => $book->getGenre()
		  ]);
	}
	public static function getProduct(int $id){
		$productData = (new Database('book'))->select('id = ' . $id)->fetch();
		return new Book($productData['id'],$productData['name'],$productData['description'],$productData['product_type'],$productData['author'], $productData['genre']);

	} 
	public static function getProducts($where = null, $order = null, $limit = null){
		return (new Database('book'))
			->select($where, $order, $limit)
			->fetchAll(
				PDO::FETCH_PROPS_LATE | PDO::FETCH_CLASS,
				'App\Models\Book',
				[	'id',
					'name',
					'description',
					'product_type',
					'author',
					'genre'
				]
			);
	} 
}