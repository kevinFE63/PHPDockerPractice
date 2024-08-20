<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-ALlow-Origins, Content-Type, Authorization, X-Requested-With');


include_once('../core/initialize.php');


$user = new User($db);

$data = json_decode(file_get_contents('php://input'));

$user->username = $data->username;
$user->email = $data->email;
$user->password = $data->password;


$result = $user->register();

echo json_encode($result);
