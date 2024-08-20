<?php

// headers

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');


$post = new POST($db);


$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$itemsPerPage = isset($_GET['itemsPerPage']) ? intval($_GET['itemsPerPage']) : 10;

$response = $post->read($page,$itemsPerPage);
$data = $response['data'];
$total = $response['total'];


if(count($data) > 0){
    echo json_encode(array(
        'data' => $data,
        'total' => $total,
        'page' => $page,
        'itemsPerPage' => $itemsPerPage
    ));
}
else
{
    echo json_encode(array('message' => 'No Post Found'));
}




/* 

$num = $result->rowCount();

if($num > 0){
    $post_arr = array();
 
    $post_arr['count'] = 0;
    $post_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'category_id' => $category_id,
            'category_name' => $category_name
        );

        array_push($post_arr['data'], $post_item);
    }
    $post_arr['count'] = count($post_arr['data']);
  

    echo json_encode($post_arr);
}else{

    echo json_encode(array('message' => 'No Post Found'));

} */