<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <title>De shop</title>

    <style>
        .product img {
            max-width: 10em;
            max-height: 8em;
        }

        .product td {
            padding: 4px 12px 4px 12px;
        }
    </style>
</head>

<body>
    <h1>De shop</h1>
    <div>
        <a href="index.php?c=cart&m=show">Bekijk winkelwagen</a>
    </div>
    <table id="product_list">
        <?php
        foreach ($products as $product) {
            $price = number_format($product->price / 100, 2);
            $price = str_replace(",", "-", $price);
            $price = str_replace(".", ",", $price);
            $price = str_replace("-", ".", $price);

            echo "<tr id='product_{$product->idproduct}' class='product'>" .
                "<td><img src='img/items/product_{$product->idproduct}.webp'></td>" .
                "<td><span class='product_name'>{$product->name}</span></td>" .
                "<td><span class='product_description'>{$product->description}</span></td>" .
                "<td><span class='product_price'>€ {$price}</span></td>" .
                "<td><a href='index.php?c=cart&m=add&id={$product->idproduct}'>Voeg toe aan winkelmandje</a></td>".
                "</tr>";

            // echo "<li><a href='index.php?c=cart&m=add&id={$product->idproduct}'>{$product->name}</a>".
            //     "<span>: {$product->description} | € {$price}</span></li>";
        }
        ?>
    </table>
</body>

</html>