<?php
class Database {

  // specify your own database credentials
  private $host = 'localhost';
  private $db_name = 'api';
  private $username = '';
  private $passwd = '';
  private $driver = 'pgsql';
  public $conn = '';

  // get the database connection
  public function getConnection() {

    $this->conn = null;
    $conn = $this->driver . ':host=' . $this->host .
      ';dbname=' . $this->db_name;

    try{
      $this->conn = new PDO($conn, $this->username, $this->passwd);
      $this->conn->exec('set names utf8');
    }catch(PDOException $exception){
      echo 'Connection error: ' . $exception->getMessage();
    }

    return $this->conn;
  }
}
