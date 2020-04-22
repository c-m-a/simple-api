<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/database.php';
include_once '../models/citizen.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare citizen object
$citizen = new citizen($db);

// get id of citizen to be edited
$data = json_decode(file_get_contents('php://input'));

// set citizen id to be edited
$citizen->id = $data->id;

// set citizen property values
$citizen->full_name = $data->full_name;
$citizen->last_name = $data->last_name;
$citizen->document_number = $data->document_number;
$citizen->document_type = $data->document_type;
$citizen->dob = date('Y-m-d', strtotime($data->dob));
$citizen->mobile_phone = $data->mobile_phone;
$citizen->filename = $data->filename;

// update the citizen
if($citizen->update()){

  // set response code - 200 ok
  http_response_code(200);

  // tell the user
  echo json_encode(array('message' => 'citizen was updated!'));
} else {

  // if unable to update the citizen, tell the user
  // set response code - 503 service unavailable
  http_response_code(503);

  // tell the user
  echo json_encode(array('message' => 'Unable to update citizen!'));
}
