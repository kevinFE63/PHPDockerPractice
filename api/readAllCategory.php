<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$category = new CATEGORY($db);

$result = $category->getCategories();

$num = $result->rowCount();

if($num > 0){
    $category_arr = array();
    $category_arr['count'] = 0;
    $category_arr['data'] = array();


    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $category_item = array(
            'id' => $id,
            'name' => $name,
            'created_at' => $created_at,
        );

        array_push($category_arr['data'], $category_item);
    }
    $category_arr['count'] = count($category_arr['data']);

    echo json_encode($category_arr);

}
else
{
    echo json_encode(array('message'=>'No Categories Found'));
}
