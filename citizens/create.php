<?php
// required headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 3600');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// get database connection
include_once '../config/database.php';

// instantiate citizen object
include_once '../models/citizen.php';

$database = new Database();
$db = $database->getConnection();

$citizen = new citizen($db);

// get posted data
$data = json_decode(file_get_contents('php://input'));

// make sure data is not empty
$all_fields_sent = !(empty(trim($data->full_name)) &&
  empty(trim($data->last_name)) &&
  empty(trim($data->document_number)) &&
  empty(trim($data->document_type)) &&
  empty(trim($data->filename)) &&
  empty(trim($data->dob)) &&
  empty(trim($data->mobile_phone)) &&
  empty(trim($data->full_name)) &&
);

if ($all_fields_sent) {
  // set citizen property values
  $citizen->full_name = $data->full_name;
  $citizen->last_name = $data->last_name;
  $citizen->document_number = $data->document_number;
  $citizen->document_type = $data->document_type;
  $citizen->dob = $data->dob;
  $citizen->mobile_phone = $data->mobile_phone;

  // create the citizen
  if($citizen->create()){

    // set response code - 201 created
    http_response_code(201);

    // tell the client that citizen was created
    echo json_encode(array('message' => 'citizen was created!'));
  } else {
    // if unable to create the citizen, tell the user
    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array('message' => 'Unable to create citizen!'));
  }
} else {
  // tell the user data is incomplete
  // set response code - 400 bad request
  http_response_code(400);

  // tell the user
  echo json_encode(
    array('message' => 'Unable to create citizen. Data is incomplete.')
  );
}
