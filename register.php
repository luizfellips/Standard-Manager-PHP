<?php
use App\Entity\DBProduct;

require __DIR__.'/vendor/autoload.php';

define('TITLE','Register a product');

if(isset($_POST['Name'],$_POST['Description'],$_POST['ProductType'])){
    $product_type = "App\Entity\\"  . $_POST['ProductType'];
    $product_db = "App\Entity\\" . "DB" . $_POST['ProductType'];
    $attributes = array_filter(
        array(
            'author' => $_POST['Author'],
            'genre' => $_POST['Genre'],
        )
    );

    $product = new $product_type(null,$_POST['Name'],$_POST['Description'],$_POST['ProductType'],...array_values($attributes));
    try {
        $book_id = DBProduct::register($product);
        call_user_func_array(array($product_db,'register'),array($product,$book_id));
        

    } catch (\Throwable $th) {
        print_r($th);
    }

}



include __DIR__.'/includes/header.php';
include __DIR__.'/includes/form.php';
include __DIR__.'/includes/footer.php';