<?php
session_start(); // ready to go!

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $u = new webshop\User();
        if ($u->isValidUser($_POST['username'], $_POST['password'])){
            $_SESSION['loggedin'] = true;
        }
    }
}
header("Location:index.php");