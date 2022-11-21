<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <title>Boodschappenwagentje</title>

    <style>
        #message {
            font-size: 2em;
            font-weight: bold;
        }

        .product img {
            max-width: 10em;
            max-height: 8em;
        }

        .product td {
            padding: 4px 12px 4px 12px;
        }
    </style>
</head>

<body onload="init()">
    <h1>De inhoud van uw winkelwagentje</h1>
    <table id="product_list">
        <tr>
            <th></th>
            <th>Product</th>
            <th>Hoeveelheid</th>
            <th>Prijs</th>
        </tr>
        <?php
        $total = 0;
        foreach ($items as $item) {
            $total += $item->quantity * $item->price;
            $price = number_format($item->quantity * $item->price / 100, 2);
            $price = str_replace(",", "-", $price);
            $price = str_replace(".", ",", $price);
            $price = str_replace("-", ".", $price);

            echo "<tr id='product_{$item->idproduct}' class='product'>" .
                "<td><img src='img/items/product_{$item->idproduct}.webp'></td>" .
                "<td><span class='product_name'>{$item->name}</span></td>" .
                "<td><span class='product_description'>" .
                "<a href='index.php?c=cart&m=removeQuantity&id={$item->idcart}'><button class='item_minus'>-</button></a> ".
                "{$item->quantity}" .
                "<a href='index.php?c=cart&m=addQuantity&id={$item->idcart}'><button class='item_add'>+</button></a> " .
                "</span></td>" .
                "<td><span class='product_price'>€ {$price}</span></td>" .
                "<td><a href='index.php?c=cart&m=del&id={$item->idproduct}'><button>Verwijder uit winkelmandje</button></a></td>" .
                "</tr>";
        }
        ?>
    </table>

    <?php
    $total = number_format($total, 2);
    $total = str_replace(",", "-", $total);
    $total = str_replace(".", ",", $total);
    $total = str_replace("-", ".", $total);

    echo "<div><i>Subtotaal: € {$total}</i></div>";
    ?>
    
    <a href="index.php">Verder winkelen</a>
</body>

<script>
    function init() {
        if (document.URL.indexOf("m=add") >= 0) {
            window.history.pushState([], '', "index.php?c=cart&m=show")
        }
    }
</script>

</html>