<?php

    //code...
$db_user = 'php_docker';
$db_password = 'password';

$dsn = 'mysql:host=db;dbname=php_docker;charset=utf8';

$db = new PDO($dsn,$db_user,$db_password);

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


define('APP_NAME', 'PHP REST API TUTORIAL');