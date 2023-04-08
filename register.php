<?php
use App\DBs\DBProduct;

require __DIR__.'/vendor/autoload.php';

define('TITLE','Register a product');

if(isset($_POST['Name'],$_POST['Description'],$_POST['ProductType'])){
    $product_type = "App\Models\\"  . $_POST['ProductType'];
    $product_db = "App\DBs\\" . "DB" . $_POST['ProductType'];
    $attributes = array_filter(
        array(
            'author' => $_POST['Author'],
            'genre' => $_POST['Genre'],
            'size' => $_POST['Size'],
            'height' => $_POST['Height'],
            'width' => $_POST['Width'],
            'length' => $_POST['Length']
        )
    );

    $product = new $product_type(null,$_POST['Name'],$_POST['Description'],$_POST['ProductType'],...array_values($attributes));
    try {
        $product_id = DBProduct::register($product);
        call_user_func_array(array($product_db,'register'),array($product,$product_id));
        header("Location: index.php");
        exit;

    } catch (\Throwable $th) {
        print_r($th);
    }

}



include __DIR__.'/includes/header.php';
include __DIR__.'/includes/form.php';
include __DIR__.'/includes/footer.php';