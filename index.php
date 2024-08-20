<?php

echo "index";

try {
    $dsn = 'mysql:host=db;dbname=php_docker;charset=utf8';
    $username = 'php_docker';
    $password = 'password';

    $pdo = new PDO($dsn,$username,$password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    

/* $conn = mysqli_connect('db', 'php_docker', 'password', 'php_docker'); */


/* 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} */



$table_name = "php_docker_table";

$query = "SELECT * FROM $table_name";

/* $response = $conn->query($query); */
$stmt = $pdo->prepare($query);

$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);



echo "<h1>Table: $table_name</h1>";

foreach($result as $row)
{
    echo "<p>";
    foreach($row as $key => $value)
    {
        echo "$key: $value<br>";
    }
    echo "</p> <hr>";

}


} catch (\Throwable $th) {
    //throw $th;
}
