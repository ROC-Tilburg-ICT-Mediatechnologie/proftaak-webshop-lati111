<?php

namespace webshop;

use webshop\Product_Model;

class Product extends AbstractView
{
    public function showAddProduct()
    {
       \session_start();
        if ($_SESSION['loggedin'] !== true) {
            header('location: index.php?c=User&m=showLogin');
        } else {
            $this->showView('addproduct', []);
        }
    }

    public function showProductList()
    {
        \session_start();
        if ($_SESSION['loggedin'] !== true) {
            header('location: index.php?c=User&m=showLogin');
        } else {
            $this->showView('productlist', []);
        }
        
    }

    public function showUpdateProduct()
    {
        \session_start();
        if ($_SESSION['loggedin'] !== true) {
            header('location: index.php?c=User&m=showLogin');
        } else {
            $this->showView('updateproduct', []);
        }
    }

    public function displayProducts()
    {
        \session_start();
        if ($_SESSION['loggedin'] !== true) {
            header('location: index.php?c=User&m=showLogin');
        }
        $product = new Product_Model();

        $products = $product->listProducts();

        $html = "";
        $html .= "<table style='border: 1px solid black;'  class='products'>";
        $html .= "<tr>";
        $html .= "<th>product name</th><th>description</th><th>price</th><th>stock</th>";
        $html .= "</tr>";
        foreach ($products as $product) {
            $html .= "<tr>";
            $html .= "<td>" . $product->name . "</td>";
            $html .= "<td>" . $product->description . "</td>";
            $html .= "<td>" . $product->price . "</td>";
            $html .= "<td>" . $product->stock . "</td>";
            $html .= "<td>" . "<a href='index.php?c=product&m=showUpdateProduct&id=" . $product->idproduct . "'>Edit</a> <a href='index.php?c=product&m=deleteProduct&id=" . $product->idproduct . "'>Remove</a></td>";
            $html .= "</tr>";
        }
        $html .= "</table>";
        $html .= "<a href='index.php?c=user&m=showDash'>back</a>";
        echo $html;
    }

    public function addproduct()
    {
        
        \session_start();
        if ($_SESSION['loggedin'] !== true) {
            header('location: index.php?c=User&m=showLogin');
        }

        $price = (int)$_POST['price'];
        $stock = (int)$_POST['stock'];

        

        $product = new Product_Model();
        $product->addProduct($_POST['name'], $_POST['desciption'], $price, $stock);
        header('location: index.php?c=user&m=showDash');
    }

    public function updateProduct()
    {
        \session_start();
        if ($_SESSION['loggedin'] !== true) {
            header('location: index.php?c=User&m=showLogin');
        }

        $product = new Product_Model();

        $price = (int)$_POST['price'];
        $stock = (int)$_POST['stock'];


        $product->updateProduct($_POST['id'], $_POST['name'], $_POST['desciption'], $price, $stock);
        \header('location: index.php?c=product&m=displayProducts');
    }

    public function deleteProduct()
    {
        \session_start();
        if ($_SESSION['loggedin'] !== true) {
            header('location: index.php?c=User&m=showLogin');
        }

        $id = $_GET['id'];
        $product = new Product_Model();
        $product->deleteProduct($id);
        \header('location: index.php?c=product&m=displayProducts');
    }
}
