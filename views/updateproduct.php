<?php 
namespace webshop;
use webshop\Product_Model;

$product = new Product_Model;

$currentProduct = $product->getProduct($_GET['id']);

?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8"/>
    <title>edit product</title>
</head>
<body>
<h1>Edit product</h1>
<!-- de action gaat naar de index, in de query string staat welke controller gerbuikt moet worden en welke method daarin uitgevoerd-->
<form action="index.php?c=product&m=updateProduct" method="POST">
    <input type="hidden" name="id" value='<?php echo $currentProduct[0]->idproduct?>'>
    <label for="name">Name product</label><br>
    <input type="text" name="name" required value='<?php echo $currentProduct[0]->name ?>'><br>
    <label for='desciption'>description</label><br>
    <input type="text" name="desciption" value='<?php echo $currentProduct[0]->description ?>' ></label><br>
    <label for='stock'>stock</label><br>
    <input type="number" name="stock" value='<?php echo $currentProduct[0]->stock ?>'></label><br>
    <label for='price'>price</label><br>
    <input type="number" name="price" value='<?php echo $currentProduct[0]->price ?>'></label><br>
    <input type="submit" value="update"><br>
    
    <a href="index.php?c=product&m=displayProducts">back</a>
</form>
</body>
</html>