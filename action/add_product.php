<?php


require '../connect/db.php';

$path = "uploads/" . time() . "_" . $_FILES["image"]["name"];


if (move_uploaded_file($_FILES["image"]["tmp_name"], "../" . $path))
{
    $title = $_POST["title"];
    $descrription = $_POST["descrription"];
    $price = $_POST["price"];
    $catagory = $_POST["catagory"];

    mysqli_query($db, "INSERT INTO `products` (`id`, `title`, `description`, `price`, `category`, `image`) VALUES (NULL, '$title', '$descrription', '$price', '$catagory', '$path')");

    die("Товар добавлен");
} else {
    die("Error upload product image");
}

?>
