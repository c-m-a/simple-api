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

  function read() {
    $query = 'SELECT * FROM ' . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  function create() {

    // Create insert query
    $query = 'INSERT INTO' . $this->table_name .
      'SET
        full_name = :full_name,
        last_name = :last_name,
        document_number = :document_number,
        document_type = :document_type,
        email = :email,
        mobile_phone = :mobile_phone,
        dob = :dob,
        filename = :filename';

    // Prepare query
    $stmt = $this->conn->prepare($query);

    // Sanitize
    $this->full_name = htmlspecialchars(strip_tags($this->full_name));
    $this->last_name = htmlspecialchars(strip_tags($this->last_name));
    $this->document_number = htmlspecialchars(strip_tags($this->document_number));
    $this->document_type = htmlspecialchars(strip_tags($this->document_type));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->mobile_phone = htmlspecialchars(strip_tags($this->mobile_phone));
    $this->dob = htmlspecialchars(strip_tags($this->dob));
    $this->filename = htmlspecialchars(strip_tags($this->filename));

    // bind values
    $stmt->bindParam(':full_name', $this->full_name);
    $stmt->bindParam(':last_name', $this->last_name);
    $stmt->bindParam(':document_number', $this->document_number);
    $stmt->bindParam(':document_type', $this->document_type);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':mobile_phone', $this->mobile_phone);
    $stmt->bindParam(':dob', $this->dob);
    $stmt->bindParam(':filename', $this->filename);

    if ($stmt->execute()) return true;

    return false;
  }
}
