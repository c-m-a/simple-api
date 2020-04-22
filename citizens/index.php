<?php
$method = $_SERVER['REQUEST_METHOD'];

$files['POST'] = 'create';
$files['GET'] = 'read';
$files['PUT'] = 'create';
$files['DELETE'] = 'destroy';

$action = $files[$method];

if (!empty($action)) {
  require($action . '.php');
} else {
  echo json_encode(
    array('message' => 'Request method not allowed!')
  );
}
