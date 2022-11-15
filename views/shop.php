<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>De shop</title>
</head>
<body>
<h1>De shop</h1>
<ul>
    <?php
    // $products moet door de controller worden doorgegeven (zie bijvoorbeeld controllers/Shop.php)
    foreach ($products as $product) {
        echo "<li><a href='index.php?c=cart&m=add&id={$product->idproduct}'>{$product->name}</a></li>";
    }
    ?>
</ul>
</body>
</html>
