<?php

namespace App\DBs;

use Module\Database;
use App\Models\Furniture;

class DBFurniture {
	public static function register(Furniture $furniture, $furniture_id){
		$db = new Database('furniture');
		$db->insert([
			'id' => $furniture_id,
			'name' => $furniture->getName(),
			'description' => $furniture->getDescription(),
			'height' => $furniture->getHeight(),
            'width' => $furniture->getWidth(),
            'length' => $furniture->getLength()
		]);

		return true;
	}
	
	public static function delete(){

	}
	public static function update(Furniture $furniture){
		return (new Database('furniture'))->update('id = '.$furniture->getId(),[
			'name' => $furniture->getName(),
			'description' => $furniture->getDescription(),
			'height' => $furniture->getHeight(),
			'width' => $furniture->getWidth(),
			'length' => $furniture->getLength()
		  ]);

	}
	public static function getProduct(int $id){
		$productData = (new Database('furniture'))->select('id = ' . $id)->fetch();
		return new Furniture($productData['id'],$productData['name'],$productData['description'],$productData['product_type'],$productData['height'], $productData['width'], $productData['length']);

	} 
	public static function getProducts($where = null, $order = null, $limit = null){
		
	} 
}