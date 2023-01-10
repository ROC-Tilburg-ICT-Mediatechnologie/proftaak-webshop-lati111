<?php

namespace webshop;

use webshop\DB2;

class User_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function setPassword(int $iduser, string $pnew)
    {
        $stmt = $this->DB->prepare('UPDATE user SET password=? WHERE iduser=?');
        $stmt->bind_param(
            'si',
            password_hash($pnew, PASSWORD_DEFAULT),
            $iduser
        );
        $stmt->execute();
        $stmt->fetch();
    }

    public function getId(string $username, string $password)
    {
        $username = $this->DB->real_escape_string($username);
        $r = $this->DB->query("SELECT iduser FROM user WHERE username=$username");
        while ($row = $r->fetch_object()) {
            if (password_verify($username, $row['username'])
                && password_verify(
                    $password,
                    $row['password']
                )
            ) {
                return $row['iduser'];
            }
        }
        return false;
    }

    public function getUser(string $username)
    {

        $username = strtolower($username);
        $this->DB = new DB2('mysql', 'root', 'root', 'webshop');
        $db = $this->DB->getConnection();
        $stmt = $db->prepare('SELECT * FROM user WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $results = $stmt->fetch();
        return $results;
    }
    public function isValidUser($username, $password) //: bool
    {
        $user = $this->getUser($username, $password);

        if (password_verify($password, $user['password'])) {
            return true;
        } else {
            return false;
        }
    }


    public function registerUser(string $username, string $password, string $name, string $tel, string $email)
    {
        $username = strtolower($username);
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->DB->prepare('INSERT INTO user (username, `password`, `name`, email, tel) VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('sssss', $username, $hashedPass, $name, $tel, $email);
        $stmt->execute();
    }
}
