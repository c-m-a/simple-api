<?php
// required headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Max-Age: 3600');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// include database and object file
include_once '../config/database.php';
include_once '../models/citizen.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare citizen object
$citizen = new citizen($db);

// get citizen id
$data = json_decode(file_get_contents('php://input'));

// set citizen id to be deleted
$citizen->id = $data->id;

// delete the citizen
if ($citizen->destroy()) {

  // set response code - 200 ok
  http_response_code(200);

  // tell the user
  echo json_encode(array('message' => 'citizen was deleted.'));
} else {
  // if unable to delete the citizen
  // set response code - 503 service unavailable
  http_response_code(503);

  // tell the user
  echo json_encode(array('message' => 'Unable to delete citizen.'));
}
