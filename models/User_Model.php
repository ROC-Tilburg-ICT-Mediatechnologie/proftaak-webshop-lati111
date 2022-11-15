<?php

namespace webshop;


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
}