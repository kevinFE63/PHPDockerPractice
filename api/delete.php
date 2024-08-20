<?php


header('Acess-Control-Allow-Cross-Origin: *');

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type,Authorization,X-Requested-With');


include_once('../core/initialize.php');

$post = new POST($db);

$data = json_decode(file_get_contents("php://input"));


$post->id = $data->id;

if($post->delete()){
    echo json_encode(array('message' => 'Post has been deleted.'));
}else{
    echo json_encode(array('message' => 'Post not deleted.'));
}




