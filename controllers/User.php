<?php

namespace webshop;
use webshop\User_Model;

//TODO: uitwerken

class User extends AbstractView{

    public function showLogin(){
        $this->showView('login', []);
    }

    public function showDash(){
        $this->showView('dashboard', []);
    }

    public function login(){
        $userM = new User_Model;
    }

}
