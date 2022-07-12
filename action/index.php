<?php

    require_once '../connect/db.php';

    $products = mysqli_query($db , "SELECT * FROM `products`");

?>


<table border="1" cellspacing="0">
    <tr>
        <th>id</th>
        <th>image</th>
        <th>title</th>
        <th>price</th>
        <th>catagory</th>
        <th>more</th>

    </tr>

    <?php

while ($product = mysqli_fetch_assoc($products)) {
    ?>

    <tr>
        <td><?= $product["id"] ?></td>
        <td><img src="<?= "../" . $product["image"] ?>" alt="img" width="100"></td>
        <td><?= $product["title"] ?></td>
        <td><?= $product["price"] ?></td>
        <td><?= $product["category"] ?></td>
        <td><a href="view_product.php?id=<?= $product["id"] ?>">view</a></td>
        <td><a href="edit_product.php?id=<?= $product["id"] ?>">update</a></td>
    </tr>

    <?php
}

    ?>

</table>

<form action="add_product.php" method="post" enctype="multipart/form-data">
        <p>Title</p>
        <input type="text" name="title">
        <p>Dedcrrition</p>
        <textarea name="descrription"></textarea>
        <p>Price</p>
        <input type="number" name="price">
        <p>Категории</p>
        <select name="category">
            <option>Игрушки</option>
            <option>Хоз. товары</option>
            <option>Продукты</option>
        </select>
        <p>Image</p>
        <input type="file" name="image">
        <br>
        <br>
        <button type="submit">ADD</button>
    </form>
