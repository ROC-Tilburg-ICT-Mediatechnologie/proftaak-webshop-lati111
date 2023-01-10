<?php
namespace webshop;

class DB2
{
    private static $instance;
    private $pdo;

    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function getInstance($host, $username, $password, $dbname) {
        if(!self::$instance) { // If no instance then make one
            self::$instance = new self($host, $username, $password, $dbname);
        }
        return self::$instance;
    }

    public function __construct($host, $username, $password, $dbname) {
        $this->pdo = new \PDO("mysql:host=" . $host . ";dbname=" . $dbname, $username, $password);

        // Controle connectie
        
    }

    // Get mysqli connection
    public function getConnection() {
        return $this->pdo;
    }

    //Prevent override
    private function __clone() {}
    private function __wakeup() {}

}