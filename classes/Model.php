<?php

namespace webshop;

class Model
{
    protected $DB;

    public function __construct()
    {
        $DB = DB::getInstance('mysql', 'root', 'root', 'webshop');
        $this->DB = $DB->getConnection();
    }

    protected function select($sql): array
    {
        $table = [];
        $result = $this->DB->query($sql);
        while ($row = $result->fetch_object()) {
            $table[] = $row;
        }
        return $table;
    }

    protected function insert($sql): bool
    {
        return $this->DB->query($sql);
    }

    protected function del($sql): bool
    {
        return $this->DB->query($sql);
    }
}