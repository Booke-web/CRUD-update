<?php

require_once '../connect/db.php';

$new_image = false;
$path = "";

if ($_FILES["image"]["name"]) {
    $new_image = true;

    $path = "uploads/" . time() . "_" . $_FILES["image"]["name"];

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], "../" . $path)) {
        die("error upload image");
    }
}

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$category = $_POST['category'];

if (!new_image) {
    $path = $_POST["image_url"];
}



$query = mysqli_query($db , "UPDATE `products` SET `title` = '$title', 
`description` = '$description',
`price` = '$price',
`category` = '$category',
`image` = '$path'
WHERE `products`.`id` = $id");



die ($query ? "product is update" : "product is not update");
