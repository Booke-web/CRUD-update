<?php

require_once '../connect/db.php';


$id = $_GET["id"];

$product  = mysqli_query($db , "SELECT * FROM `products` WHERE id = $id;");

if (mysqli_num_rows($product) === 0) {
    die("Такого продукта не существует");
}

$product = mysqli_fetch_assoc($product);

?>

<img src="<?= "../" .$product["image"] ?>" alt="img" width="200">
<h1><?= $product["title"] ?></h1>
<p><?= $product["description"] ?></p>
<b><?= $product["price"] ?>₽</b>

