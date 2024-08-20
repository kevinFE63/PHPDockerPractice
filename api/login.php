<?php


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, X-Requested-With');


include_once('../core/initialize.php');

$user = new User($db);

$user_arr = array();

$data = json_decode(file_get_contents('php://input'));

$user->email = $data->email;
$user->password = $data->password;

if($user->login()){

    $user_arr['message'] = "Login Successfully";
    $user_arr['data'] = array(
        'user_id' => $user->id,
        'email' => $user->email,
        'username' => $user->username,
    );

    echo json_encode($user_arr);


} else {
    echo json_encode(array('message' => 'Login Failed'));
}