<?php

namespace webshop;

session_start();

class Cart extends AbstractView
{
    private $items = []; //Products added to the cart
    private $c_model;
    private $o_model;

    public function __construct()
    {
        $this->c_model = new Cart_Model();
        $this->o_model = new Order_Model();
    }

    public function show()
    {
        $temphash = (isset($_SESSION['temphash'])) ? $_SESSION['temphash']
        : $this->createTempUSerId();

        $this->items = $this->c_model->getCart($temphash);
        $this->showView('cart', ['items' => $this->items]);
    }

    public function paySuccess()
    {
        $this->showView('paySuccess', []);
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

    public function checkWaardebon(array $arr) {
        $code = (isset($arr['code'])) ? $arr['code'] : false;
        $name = (isset($arr['name'])) ? $arr['name'] : false;
        $email = (isset($arr['email'])) ? $arr['email'] : false;
        $phone = (isset($arr['phone'])) ? $arr['phone'] : false;
        $address = (isset($arr['address'])) ? $arr['address'] : false;
        $temphash = (isset($_SESSION['temphash'])) ? $_SESSION['temphash']
        : $this->createTempUSerId();

        $this->items = $this->c_model->getCart($temphash);
        $waardebon = $this->o_model->getWaardebon($code);
        $waardebonArray = [
            'code' => $waardebon[0]->code, 'valueSet' => $waardebon[0]->kortingSet, 'valuePercent' => $waardebon[0]->KortingPercentage
        ];
        $prevArray = ["name" => $name, "email" => $email, "phone" => $phone, "address" => $address];

        if ($code !== false) {
            $date_now = date("Y-m-d");

            if (empty($waardebon)) {
                $this->showView('pay', [
                    'items' => $this->items,
                    'message' => "waardebon ongeldig",
                    'previous' => $prevArray
                ]);
            } else if ($waardebon["uses"] === 0) {
                $this->o_model->delWaardebon($code);
                $this->showView('pay', [
                    'items' => $this->items,
                    'message' =>
                    "waardebon al verbruikt",
                    'previous' => $prevArray
                ]);
            } else {
                if ($date_now > $waardebon["validUntil"]) {
                    $this->showView('pay', [
                        'items' => $this->items,
                        'waardebon' => $waardebonArray,
                        'message' =>
                        "waardebon toegevoegd",
                        'previous' => $prevArray
                    ]);
                } else {
                    $this->o_model->delWaardebon($code);
                    $this->showView('pay', [
                        'items' => $this->items,
                        'message' =>
                        "waardebon verlopen",
                        'previous' => $prevArray
                    ]);
                }
            }
        } else {
            $this->showView('pay', [
                'items' => $this->items,
                'message' =>
                "waardebon ongeldig",
                'previous' => $prevArray
            ]);
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
