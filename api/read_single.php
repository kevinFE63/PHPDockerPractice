<?php

// headers

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');


$post = new POST($db);


$post->id = isset($_GET['id']) ? $_GET['id'] : die();

$post->read_single();

$post_arr = array(
'title' => $post->title,
'body' => $post->body,
'author' => $post->author,
'category_id' => $post->category_id,
'category_name' => $post->category_name,
'created_at' => $post->created_at,
);


   print_r(json_encode($post_arr));
