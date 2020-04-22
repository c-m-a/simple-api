<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here
include_once '../config/database.php';
include_once '../objects/product.php';

// instantiate database and citizen object
$database = new Database();
$db = $database->getConnection();

// initialize object
$citizen = new Citizen($db);
$stmt = $citizen->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num > 0){

  // products array
  $citizens[]['records'] = array();

  // retrieve our table contents
  // fetch() is faster than fetchAll()
  // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['name'] to
    // just $name only
    extract($row);

    $product_item = array(
      'id' => $id,
      'full_name' => $full_name,
      'last_name' => $last_name,
      'document_number' => $document_number,
      'document_type' => $document_type,
      'email' => $email,
      'mobile_phone' => $mobile_phone,
      'dob' => $dob,
      'filename' => $filename
    );

    array_push($citizens['records'], $product_item);
  }

  // set response code - 200 OK
  http_response_code(200);

  // show products data in json format
  echo json_encode($products_arr);
}

// no products found will be here
