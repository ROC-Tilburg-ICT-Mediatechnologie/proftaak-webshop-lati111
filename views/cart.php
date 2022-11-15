<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <title>Boodschappenwagentje</title>
</head>

<body onload="init()">
    <h1>De inhoud van uw winkelwagentje</h1>
    <ul>
        <?php
        foreach ($items as $item) {
            $price = number_format(($item->quantity * $item->price) / 100, 2);
            $price = str_replace(",", "-", $price);
            $price = str_replace(".", ",", $price);
            $price = str_replace("-", ".", $price);
            echo "<li>$item->quantity x $item->name | € $price</li>";
        }
        ?>
        <a href="index.php">Verder winkelen</a>
    </ul>
</body>

<script>
    function init() {
        if (document.URL.indexOf("m=add") >= 0) {
            window.history.pushState([], '', "index.php?c=cart&m=show")
        }
    }
</script>

</html>