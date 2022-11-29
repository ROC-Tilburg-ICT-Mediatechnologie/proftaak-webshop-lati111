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
        $temphash = (isset($_SESSION['temphash'])) ? $_SESSION['temphash']
        : $this->createTempUSerId();

        $this->items = $this->c_model->getCart($temphash);
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
            $message = "Artikel_aan_winkelmandje_toegevoegd";
            Header("Location: index.php?c=shop&m=showMessage&message={$message}");
        }
    }

    public function addQuantity(array $arr)
    {
        $idproduct = (isset($arr['id'])) ? $arr['id'] : false;
        $temphash = (isset($_SESSION['temphash'])) ? $_SESSION['temphash']
        : $this->createTempUSerId();

        $this->items = $this->c_model->getCart($temphash);

        if ($idproduct !== false) {
            $this->c_model->changeItemQuantity($arr['id'], 1, $temphash);
            $this->show();
        }
    }

    public function removeQuantity(array $arr)
    {
        $idproduct = (isset($arr['id'])) ? $arr['id'] : false;
        $temphash = (isset($_SESSION['temphash'])) ? $_SESSION['temphash']
        : $this->createTempUSerId();

        $this->items = $this->c_model->getCart($temphash);

        if ($idproduct !== false) {
            $this->c_model->changeItemQuantity($arr['id'], -1, $temphash);
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

    public function pay() {
        $temphash = (isset($_SESSION['temphash'])) ? $_SESSION['temphash']
            : $this->createTempUSerId();

        $this->items = $this->c_model->getCart($temphash);
        $this->showView('pay', ['items' => $this->items]);
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
