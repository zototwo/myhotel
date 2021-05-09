<?php

require '../modules/BD.php';


$bd = new BD();

$id_img = $_GET['id_img'];
$rooms_id = $_GET['rooms_id'];

$bd->my_sql_one("UPDATE rooms SET PICTURE_PREV = '$id_img' WHERE rooms.ID = '$rooms_id'");

