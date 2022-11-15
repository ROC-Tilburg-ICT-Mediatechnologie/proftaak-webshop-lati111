<?php

namespace webshop;


class Product_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProduct($idproduct)
    {
        if(is_numeric($idproduct)) {
            return $this->select(
                "SELECT * FROM product WHERE idproduct={$idproduct}"
            );
        }
        return false;
    }

    public function addProduct(string $name, string $description, int $price, int $stock){
        return $this->insert("INSERT INTO product (name, description, price, stock) VALUES ('$name', '$description', $price, $stock);");
    }

    public function listProducts()
    {
        return $this->select('SELECT * FROM product');
    }
}