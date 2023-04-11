<?php
require  __DIR__ . '/vendor/autoload.php';

if(isset($_POST["PRODUCT_ID"])){
    $standard_product = App\DBs\DBProduct::getProduct($_POST["PRODUCT_ID"]);
    $product_db = "App\DBs\\" . "DB" . $standard_product->getProducttype();
    $product = call_user_func_array(array($product_db,'getProduct'),array($_POST["PRODUCT_ID"]));
    try {
       call_user_func_array(array($product_db,"delete"),array($product));
       App\DBs\DBProduct::delete($standard_product);
    } catch (\Throwable $th) {
        print_r($th);
    }

}