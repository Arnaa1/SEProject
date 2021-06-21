<?php

class ConnectDb
{
    // Hold the class instance.
    private static $instance = null;
    private $conn;

    private $host;
    private $user;
    private $pass;
    private $name;

    // The db connection is established in the private constructor.
    private function __construct()
    {
        if (getenv('HEROKU')) {
            $this->user = getenv('USERNAME');
            $this->pass = getenv('PASSWORD');
            $this->name = getenv('DBNAME');

            $this->host = "sql11.freemysqlhosting.net";

        } else {
            $this->user = "root";
            $this->pass = "rootroot";
            $this->name = "shopping_cart";

            $this->host = "localhost";
        }

        $this->conn = new PDO("mysql:host={$this->host};
        dbname={$this->name}", $this->user, $this->pass,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
