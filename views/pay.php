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

    <form id="paymentForm" action="">
        <table>
            <tr>
                <td>Naam: </td>
                <td><input id="nameInput" type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input id="emailInput" type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Telefoon nummer: </td>
                <td><input id="phoneInput" type="tel" name="phoneNumber" required></td>
            </tr>
            <tr>
                <td>Adres: </td>
                <td><input id="addressInput" type="text" name="address" required></td>
            </tr>
        </table>
        <input type="hidden" name="kortingscode">
    </form>

    <br>
    <div>
        <span>Kortingscode: </span>
        <input id="kortingscode" type="text">
        <button>voeg toe</button>
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
    ?>

    <button onclick="validateForm()">Betaal</button>
    <a href="index.php?c=cart&m=show">Terug naar winkelmandje</a>
</body>

<script>
    function init() {}

    function validateForm() {
        const nameInput = document.querySelector("#nameInput")
        const emailInput = document.querySelector("#emailInput")
        const phoneInput = document.querySelector("#phoneInput")
        const addressInput = document.querySelector("#addressInput")

        if (nameInput !== "" && emailInput !== "" && phoneInput !== "" && addressInput !== "") {
            if (nameInput.checkValidity() && emailInput.checkValidity() &&
                phoneInput.checkValidity() && addressInput.checkValidity()
            ) {
                console.log("success")
            } else {
                console.log("failure")
            }
        }

    }
</script>

</html>