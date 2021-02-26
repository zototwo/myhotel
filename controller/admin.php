<?php

$bd = new BD();
$simple = new simple();

$title = "Orders";

$sql = "SELECT orders.*, rooms.NUMBER, clients.NAME FROM `orders` LEFT JOIN rooms ON orders.ID_TO_ROOM = rooms.ID LEFT JOIN clients ON orders.ID_PERSON = clients.ID";

$arr['data']['orders'] = $bd->my_sql($sql);