<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Boodschappenwagentje</title>
</head>
<body>
<h1>De inhoud van uw winkelwagentje</h1>
<ul>
    <?php
        foreach ($items as $item) {
        $price = ($item->quantity * $item->price) / 100;
            echo "<li>$item->quantity x $item->name | € $price</li>";
        }
    ?>
    <a href="index.php">Verder winkelen</a>
</ul>
</body>
</html>
