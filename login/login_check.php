<?php
session_start(); // ready to go!

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $u = new webshop\User_Model();
        if ($u->isValidUser($_POST['username'], $_POST['password'])){
            $_SESSION['loggedin'] = true;
            header('location: index.php?c=user&m=showDash');
        } else {
            header("Location:index.php");
        }
    }
}
