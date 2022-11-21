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

    public function getCart(string $temphash)
    {
        return $this->select("SELECT * FROM cart 
            INNER JOIN product ON product.idproduct = cart.idproduct
            WHERE temphash = '$temphash'
            ");
    }

    public function addItem(array $arr){
        if (isset($arr['idproduct'], $arr['quantity'], $arr['temphash'])) {
            $existingid = $this->itemExists($arr['temphash'], $arr['idproduct']);
            if ($existingid === 0) {
                return $this->insert(
                    "INSERT INTO cart (idproduct, quantity, temphash) VALUES ({$arr['idproduct']}, {$arr['quantity']}, '{$arr['temphash']}');"
                );
            } else {
                return $this->update(
                    "UPDATE cart SET quantity = quantity + 1 WHERE idcart = $existingid"
                );
            }
        }
        throw new \Exception('Niet gelukt om het product toe te voegen aan het boodschappenwagentje.');
    }

    public function changeItemQuantity(int $idcart, int $changevalue, string $tempHash):bool
    {
        return $this->update(
            "UPDATE cart SET quantity = (quantity + $changevalue) WHERE idcart = $idcart AND temphash = '$tempHash'"
        );
    }

    public function delItem(array $arr){
        if (isset($arr['idproduct'])) {
            return $this->del(
                "DELETE FROM cart WHERE idproduct={$arr['idproduct']};"
            );
        }
        throw new \Exception('Niet gelukt om het product te verwijderen uit het boodschappenwagentje.');
    }

    public function itemExists(string $temphash, int $idproduct): ?int {
        return intval($this->select("SELECT idcart FROM cart 
            WHERE temphash = '$temphash' AND idproduct = '$idproduct'
            ")[0]->idcart);
    }


}