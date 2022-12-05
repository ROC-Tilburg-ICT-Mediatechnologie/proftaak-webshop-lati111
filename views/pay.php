<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <title>Betalen</title>

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
    <h1>Betaal winkelmandje</h1>

    <form id="paymentForm" action="index.php?c=cart&m=paySuccess" method="POST">
        <table>
            <tr>
                <td>Naam: </td>
                <td><input id="nameInput" type="text" name="name" value="<?php echo $previous["name"]; ?>" required></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input id="emailInput" type="email" name="email" value="<?php echo $previous["email"]; ?>" required></td>
            </tr>
            <tr>
                <td>Telefoon nummer: </td>
                <td><input id="phoneInput" type="tel" name="phoneNumber" value="<?php echo $previous["phone"]; ?>" required></td>
            </tr>
            <tr>
                <td>Adres: </td>
                <td><input id="addressInput" type="text" name="address" value="<?php echo $previous["address"]; ?>" required></td>
            </tr>
        </table>
        <input type="hidden" name="waardebon">
    </form>

    <br>
    <div>
        <div><b><?php echo $message; ?></b></div>
        <span>Waardebon: </span>
        <input id="waardebon" type="text">
        <button onclick="checkWaardebon()">voeg toe</button>
    </div>
    <br>

    <?php
    $total = 0;
    foreach ($items as $item) {
        $total += $item->quantity * $item->price;
    }

    $total = number_format($total, 2);
    $total = str_replace(",", "-", $total);
    $total = str_replace(".", ",", $total);
    $total = str_replace("-", ".", $total);

    echo "<div><i>Totaal: € {$total}</i></div>";

    if (isset($waardebon)) {
        if (isset($waardebon["valueSet"])) {
            $korting = $waardebon["valueSet"];
            $korting = str_replace(",", "-", $korting);
            $korting = str_replace(".", ",", $korting);
            $korting = str_replace("-", ".", $korting);
            echo "<div><i>Waardebon: - € {$korting}</i></div>";
            $total = $total - $waardebon["valueSet"];
        }
        if (isset($waardebon["valuePercent"])) {
            $korting = $total * $waardebon["valuePercent"];
            $korting = str_replace(",", "-", $korting);
            $korting = str_replace(".", ",", $korting);
            $korting = str_replace("-", ".", $korting);
            echo "<div><i>Waardebon: - € {$korting} (" . $waardebon["valuePercent"] . "%)</i></div>";
            $total = $total * (100 - $waardebon["valuePercent"]);
        }
    }

    $total = str_replace(",", "-", $total);
    $total = str_replace(".", ",", $total);
    $total = str_replace("-", ".", $total);
    echo "<div><i><b>Subtotaal: € {$total}</b></i></div>";
    ?>

    <button onclick="validateForm()">Betaal</button>
    <a href="index.php?c=cart&m=show">Terug naar winkelmandje</a>
</body>

<script>
    function init() {}

    function checkWaardebon() {
        const waardebon = document.querySelector("#waardebon")
        const nameInput = document.querySelector("#nameInput")
        const emailInput = document.querySelector("#emailInput")
        const phoneInput = document.querySelector("#phoneInput")
        const addressInput = document.querySelector("#addressInput")

        if (waardebon.value !== "") {
            let url = "index.php?c=cart&m=checkWaardebon&code=" + waardebon.value;
            url += "&name=" + nameInput.value;
            url += "&email=" + emailInput.value;
            url += "&phone=" + phoneInput.value;
            url += "&address=" + addressInput.value;

            window.location.href = url;
        }
    }

    function validateForm() {
        const nameInput = document.querySelector("#nameInput")
        const emailInput = document.querySelector("#emailInput")
        const phoneInput = document.querySelector("#phoneInput")
        const addressInput = document.querySelector("#addressInput")

        if (nameInput.value !== "" && emailInput.value !== "" && phoneInput.value !== "" && addressInput.value !== "") {
            if (nameInput.checkValidity() && emailInput.checkValidity() &&
                phoneInput.checkValidity() && addressInput.checkValidity()
            ) {
                document.querySelector("#paymentForm").submit();
            }
        }

    }
</script>

</html>