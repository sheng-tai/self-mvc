<?php
/*
 * create database class
 * connect to database
 * create prepare statement
 * bind value and return result
 */

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        // set dsn
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        // instance pdo
        try{
            $dbh = new PDO($dsn, $this->user, $this->password, $options);
        }catch (Exception $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
}