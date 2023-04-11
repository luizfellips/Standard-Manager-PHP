<?php

namespace App\DBs;

use Module\Database;
use App\Models\Product;
use PDO;

class DBProduct
{
	public static function register(Product $product)
	{
		$db = new Database('product');
		$inserted_id = $db->insert([
			'id' => $product->getId(),
			'name' => $product->getName(),
			'description' => $product->getDescription(),
			'product_type' => $product->getProducttype()
		]);

		return $inserted_id;
	}

	public static function delete(Product $product)
	{
		return (new Database('product'))->delete('id = '.$product->getId());
	}
	public static function update(Product $product)
	{
		return (new Database('product'))->update('id = '.$product->getId(),[
			'name' => $product->getName(),
			'description' => $product->getDescription()
		  ]);
	}
	public static function getProduct(int $id)
	{
		$productData = (new Database('product'))->select('id = ' . $id)->fetch();
		return new \App\Models\StdProduct($productData['id'],$productData['name'],$productData['description'],$productData['product_type']);
	}
	public static function getProducts($where = null, $order = null, $limit = null)
	{
		return (new Database('product'))
			->select($where, $order, $limit)
			->fetchAll(
				PDO::FETCH_PROPS_LATE | PDO::FETCH_CLASS,
				'App\Models\StdProduct',
				['id',
					'name',
					'description',
					'product_type',
				]
			);
	}
}