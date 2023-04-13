<?php
//autoload
require __DIR__.'/vendor/autoload.php';
use App\DBs\DBBook;
use App\DBs\DBProduct;
define('TITLE', 'Books');

//modal ajax check
if(isset($_GET["MODAL_PRODUCT_ID"])){
    $product_db = "App\DBs\\" . "DB" . DBProduct::getProduct($_GET["MODAL_PRODUCT_ID"])->getProducttype();
    $product = call_user_func_array(array($product_db,'getProduct'),array($_GET["MODAL_PRODUCT_ID"]));
    
    echo json_encode($product);
}
else{
    
//retrieve products from database
$products = DBBook::getProducts();
//include structures
include __DIR__ . "/includes/header.php";
include __DIR__ . "/includes/listing.php";
include __DIR__ . "/includes/footer.php";
}
