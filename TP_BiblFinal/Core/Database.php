<?php

namespace App\Core;
use PDO;
class Database extends PDO{
    private const HOST = "localhost";
    private const USER = "root";
    private const PWD = "";
    private const DBNAME = "bibliodb";
    private static $instance = null;
    
    private function __construct(){
        $dsn = "mysql:host=".self::HOST.";dbname=".self::DBNAME;
        parent::__construct($dsn, self::USER, self::PWD);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    public static function getInstance():self{
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }
}

?>