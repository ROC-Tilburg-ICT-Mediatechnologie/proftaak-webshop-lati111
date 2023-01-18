<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8"/>
    <title>add product</title>
</head>
<body>
<h1>add product</h1>
<!-- de action gaat naar de index, in de query string staat welke controller gerbuikt moet worden en welke method daarin uitgevoerd-->
<form action="index.php?c=product&m=addproduct" method="POST">
    <label for="name">Name product</label><br>
    <input type="text" name="name" required placeholder="name"/><br>
    <label for='desciption'>descrirequiredption</label><br>
    <input type="text" name="desciption" required placeholder="desciption"/></label><br>
    <label for='stock'>stock</label><br>
    <input type="number" name="stock" required placeholder="stock"/></label><br>
    <label for='price'>price</label><br>
    <input type="number" required name="price" placeholder="price"/></label><br>
    <input type="submit" value="Add product"><br>
    
    <a href="index.php?c=user&m=showDash">back</a>
</form>
</body>
</html>