<?php

require_once '../connect/db.php';

 $id = $_GET["id"];

 $product  = mysqli_query($db , "SELECT * FROM `products` WHERE id = $id;");

if (mysqli_num_rows($product) === 0) {
    die("Такого продукта не существует");
}

$product = mysqli_fetch_assoc($product);

?>

<form action="save.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $product['id']?>">
        <input type="hidden" name="image_url" value="<?= $product['image']?>">
        <p>Title</p>
        <input type="text" name="title" value="<?= $product["title"]?>">
        <p>Dedcrrition</p>
        <textarea name="description"><?= $product["description"]?></textarea>
        <p>Price</p>
        <input type="number" name="price" value="<?= $product["price"]?>">
        <p>Категории</p>
        <select name="category">
            <option><?= $product["category"]?></option>
            <?php 
                $categories = ['игрушки','хоз. товары','Продукты'];
                foreach ($categories as $category) {
                    if ($category !== $product['category']) {
                        echo "<option>" . $category ."</option>";
                    }
                }
            ?>
            
        </select>
        <p>Image</p>
        <img src="<?= "../".$product['image'] ?>" width="100"> <br>
        <input type="file" name="image">
        <br>
        <br>
        <button type="submit">SAVE</button>
    </form>
