<?php

namespace App\DBs;

use Module\Database;
use App\Models\Product;

class DBProduct {
	public static function register(Product $product){
		$db = new Database('product');
		$inserted_id = $db->insert([
			'id' => $product->getId(),
			'name' => $product->getName(),
			'description' => $product->getDescription(),
			'product_type' => $product->getProducttype()
		]);

		return $inserted_id;
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