<?php

namespace App\DBs;

use Module\Database;
use App\Models\DVD;

class DBDVD {
	public static function register(DVD $dvd, $dvd_id){
		$db = new Database('dvd');
		$db->insert([
			'id' => $dvd_id,
			'name' => $dvd->getName(),
			'description' => $dvd->getDescription(),
			'size' => $dvd->getSize()
		]);

		return true;
	}
	
	public static function delete(){

	}
	public static function update(DVD $dvd){
		return (new Database('dvd'))->update('id = '.$dvd->getId(),[
			'name' => $dvd->getName(),
			'description' => $dvd->getDescription(),
			'size' => $dvd->getSize(),
		  ]);

	}
	public static function getProduct(int $id){
		$productData = (new Database('dvd'))->select('id = ' . $id)->fetch();
		return new DVD($productData['id'],$productData['name'],$productData['description'],$productData['product_type'],$productData['size']);

	} 
	public static function getProducts($where = null, $order = null, $limit = null){
		
	} 
}