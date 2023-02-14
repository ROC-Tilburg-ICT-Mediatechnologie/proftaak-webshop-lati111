<?php
session_start();


if ($_SESSION['loggedin'] !== true ) 
{
    header('location: index.php?c=User&m=showLogin');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    
<h1>Welcome <?php echo $_SESSION['username']?> </h1>

<a href="index.php?c=product&m=showAddProduct">Add new product</a><br>
<a href="index.php?c=product&m=showProductList">List products</a><br>

<a href="index.php?c=User&m=logout">logout</a>
</body>
</html>