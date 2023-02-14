<?php

namespace webshop;

use webshop\User_Model;

//TODO: uitwerken

class User extends AbstractView
{
    public function showLogin()
    {
        $this->showView('login', []);
    }

    public function showDash()
    {
        $this->showView('dashboard', []);
    }

    public function showRegister()
    {
        $this->showView('register', []);
    }

    public function register()
    {
        $userM = new User_Model();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repeat_password']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['tel'])) {
                if ($_POST['password'] == $_POST['repeat_password']) {
                    $userM->registerUser($_POST['username'], $_POST['password'], $_POST['name'], $_POST['tel'], $_POST['email']);
                    header('location: index.php?c=user&m=showLogin');
                } else {
                    \header('location: index.php?c=user&m=showRegister&erro=1');
                }
            } else {
                \header('location: index.php?c=user&m=showRegister&erro=2');
            }
        } else {
            \header('location: index.php?c=user&m=showRegister&erro=3');
        }
    }

    public function login()
    {
        $userM = new User_Model();
        session_start(); // ready to go!

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                if ($userM->isValidUser($_POST['username'], $_POST['password'])) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $_POST['username'];
                    header('location: index.php?c=user&m=showDash');
                } else {
                    header("location: index.php?c=user&m=showLogin&error=1");
                }
            } else {
                header("location: index.php?c=user&m=showLogin&error=2");
            }
        } else {
            header("location: index.php?c=user&m=showLogin&error=3");
        }
    }

    public function logout() {
        \session_start();
        unset($_SESSION['loggedin']);
        unset($_SESSION['username']);
        \header('location: index.php?c=user&m=showLogin');
    }
}
