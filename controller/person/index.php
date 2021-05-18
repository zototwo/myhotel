<?php
$bd = new BD();

$id = $_COOKIE['person'];

$sql = "SELECT orders.*, rooms.NUMBER FROM orders LEFT JOIN rooms ON orders.ID_TO_ROOM = rooms.ID WHERE orders.ID_PERSON = ". $id;

$arr['data']['orders'] = $bd->my_sql($sql);

$title = "Персона";



