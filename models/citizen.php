<?php
class Citizen {
  // Database connection and table name
  private $conn;
  private $table_name = 'citizens';

  // obj properties
  public $id;
  public $full_name;
  public $last_name;
  public $document_number;
  public $document_type;
  public $email;
  public $mobile_phone;
  public $dob;
  public $filename;

  // constructor with $db as database connection
  public function __construct($db) {
    $this->conn = $db;
  }
}
