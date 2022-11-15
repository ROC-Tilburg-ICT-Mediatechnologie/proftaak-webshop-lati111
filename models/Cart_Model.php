<?php

namespace webshop;


class Cart_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listItems()
    {
        return $this->select('SELECT * FROM cart');
    }

    public function addItem(array $arr){
        if (isset($arr['idproduct'], $arr['quantity'], $arr['temphash'])) {
            return $this->insert(
                "INSERT INTO cart (idproduct, quantity, temphash) VALUES ({$arr['idproduct']}, {$arr['quantity']}, '{$arr['temphash']}');"
            );
        }
        throw new \Exception('Niet gelukt om het product toe te voegen aan het boodschappenwagentje.');
    }

    public function delItem(array $arr){
        if (isset($arr['idproduct'])) {
            return $this->del(
                "DELETE FROM cart WHERE idproduct={$arr['idproduct']};"
            );
        }
        throw new \Exception('Niet gelukt om het product te verwijderen uit het boodschappenwagentje.');
    }


}