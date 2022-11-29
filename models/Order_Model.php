<?php

namespace webshop;


class Order_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getWaardebon(string $code)
    {
        return $this->select("SELECT * FROM waardebon WHERE code = '$code'");

    }

    public function waardebonUse(string $code) {
        $this->update("UPDATE waardebon SET uses = (uses - 1) WHERE code = '$code'");
    }

    public function delWaardebon(string $code) {
        $this->del("DELETE FROM waardebon WHERE code = '$code'");
    }
}
