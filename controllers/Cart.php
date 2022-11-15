<?php

namespace webshop;

session_start();

class Cart extends AbstractView
{
    private $items = []; //Products added to the cart
    private $c_model;

    public function __construct()
    {
        $this->c_model = new Cart_Model();
    }

    public function show()
    {
        $this->items = $this->c_model->listItems();
        $this->showView('cart', ['items' => $this->items]);
    }

    public function add(array $arr)
    {
        $idproduct = (isset($arr['id'])) ? $arr['id'] : false;
        $quantity = (isset($arr['quantity'])) ? $arr['quantity'] : 1;
        $temphash = (isset($_SESSION['temphash'])) ? $_SESSION['temphash']
            : $this->createTempUSerId();

        $arr = [
            'idproduct' => $idproduct,
            'quantity'  => $quantity,
            'temphash'  => $temphash
        ];

        if ($idproduct !== false) {
            $this->c_model->addItem($arr);
            $this->show();
        }
    }

    public function del(array $arr){
        $idproduct = (isset($arr['id'])) ? $arr['id'] : false;
        $arr = [
            'idproduct' => $idproduct
        ];

        if ($idproduct !== false) {
            $this->c_model->delItem($arr);
            $this->show();
        }
    }

    private function createTempUserId()
    {
        $userid = password_hash(
            'a new id for this amazing user who is buying stuff from us or at least is adding it to a cart...',
            PASSWORD_DEFAULT
        );
        $_SESSION['temphash'] = $userid;
        return $userid;
    }
}
