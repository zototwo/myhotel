<?php

require '../modules/BD.php';

//print_r($_GET);
$CAT_NAME = $_GET['NAME'];

$bd = new BD();
if($_GET['add'] == 'Update'){
    $sql = "UPDATE category SET NAME = '$CAT_NAME' WHERE category.ID = ".$_GET['id'];
    $answer = $bd->my_sql_one($sql);
    print_r($answer);
}
if($_GET['add'] == 'New'){
    $answer = $bd->my_inject("NULL,'$CAT_NAME'",'category');
    print_r($answer);
}
