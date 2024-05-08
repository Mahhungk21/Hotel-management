<?php
include_once __DIR__ . "/../model/product-model.php";
include_once __DIR__ . "/../model/category-model.php";
echo "Hello <br>";

$list = new ProductModel();

echo "Hello <br>";
$arr = $list->getAllProduct();
foreach ($arr as $row) {
    echo var_dump($row) . "<br>";
}

echo "Hello <br>";
$g = $list->getProduct(1012);
echo var_dump($g) . "<br>";


echo "Hello <br>";
$insert = $list->insertProduct('3021', 'giày nam', 110, 'hello', 39);
echo var_dump($insert) . "<br>";

