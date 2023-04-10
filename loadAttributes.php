<?php
require __DIR__.'/vendor/autoload.php';

if (isset($_POST['data'])) {
    $method = $_POST['data'][0];
    $standard_product = App\DBs\DBProduct::getProduct($_POST['data'][1]);
    $product_db = "App\DBs\\" . "DB" . App\DBs\DBProduct::getProduct($_POST['data'][1])->getProducttype();
    $product = call_user_func_array(array($product_db, 'getProduct'), array($_POST['data'][1]));
    $attribute = call_user_func(array($product, $method));
    echo $attribute;
}