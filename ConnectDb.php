<?php

require 'flight/Flight.php';

class ConnectDb
{
    // Hold the class instance.
    private static $instance = null;
    private $conn;

    if (getenv('HEROKU')) {
    $username = getenv('USERNAME');
    $password = getenv('PASSWORD');
    $dbname = getenv('DBNAME');

    $host = "localhost";
    } else { 


    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'rootroot';
    private $name = 'shopping_cart';
    }
    Flight::register("db", "PDO", array("mysql:host=$host;dbname=$dbname", $username, $password), function ($db) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
});

    // The db connection is established in the private constructor.
    private function __construct()
    {
        $this->conn = new PDO("mysql:host={$this->host};
    dbname={$this->name}", $this->user, $this->pass,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new ConnectDb();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
