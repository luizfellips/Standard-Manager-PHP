<?php
require __DIR__ . '/vendor/autoload.php';
define('TITLE', 'Edit product');


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: index.php');
}

$standard_product = App\DBs\DBProduct::getProduct($_GET['id']);
$product_type = $standard_product->getProducttype();
$product_db = "App\DBs\\" . "DB" . $product_type;
$product = call_user_func_array(array($product_db, 'getProduct'), array($_GET['id']));


if (isset($_POST['Name'], $_POST['Description'])) {
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

    try {
        $model_string = "App\Models\\" . $product_type;
        $standard_product = new App\Models\StdProduct($_GET['id'], $_POST['Name'], $_POST['Description']);
        $product = new $model_string($_GET['id'], $_POST['Name'], $_POST['Description'], $product_type, ...array_values($attributes));

        App\DBs\DBProduct::update($product);
        $product_db::update($product);

        header("Location: index.php");
    } catch (\Throwable $th) {
        print_r($th);
    }


}
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/edit_form.php';
include __DIR__ . '/includes/footer.php';