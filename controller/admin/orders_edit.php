<?php
$bd = new BD();
$simple = new simple();

$title = "Orders";
$get = $simple->simple_get();

//$sql = "SELECT orders.*, rooms.NUMBER, clients.NAME FROM `orders` LEFT JOIN rooms ON orders.ID_TO_ROOM = rooms.ID LEFT JOIN clients ON orders.ID_PERSON = clients.ID";

$sql = "SELECT orders.*, clients.*, rooms.NUMBER FROM orders LEFT JOIN clients ON orders.ID_PERSON = clients.ID LEFT JOIN rooms ON orders.ID_TO_ROOM = rooms.ID WHERE orders.ID = ". $get['ID'];
$arr['data']['orders'] = $bd->my_sql($sql)[0];

