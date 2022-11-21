<?php

namespace webshop;

class Shop extends AbstractView
{
    private $products = [];

    public function __construct()
    {
        $p_model = new Product_Model();
        $this->products = $p_model->listProducts();
        if (!isset($_GET["m"])) {
            $this->showView('shop', ['products' => $this->products]);
        }
    }

    public function showMessage(array $args)
    {
        $message = str_replace("_", " ", $args["message"]);
        $this->showView('shop', ['products' => $this->products, 'message' => $message]);
    }
}