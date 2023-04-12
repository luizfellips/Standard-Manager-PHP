<?php

namespace App\DBs;

use Module\Database;
use App\Models\DVD;
use \PDO;
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
	
	public static function delete(DVD $dvd){
		return (new Database('dvd'))->delete('id = '.$dvd->getId());
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
		return (new Database('dvd'))
			->select($where, $order, $limit)
			->fetchAll(
				PDO::FETCH_PROPS_LATE | PDO::FETCH_CLASS,
				'App\Models\DVD',
				[	'id',
					'name',
					'description',
					'product_type',
					'size'
				]
			);
	} 
}