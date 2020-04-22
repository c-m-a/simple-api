<?php
// required headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Max-Age: 3600');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

$method = $_SERVER['REQUEST_METHOD'];

$files['POST'] = 'create';
$files['GET'] = 'read';
$files['PUT'] = 'update';
$files['DELETE'] = 'destroy';

$action = $files[$method];

require($action . '.php');
