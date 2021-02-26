<?php
$bd = new BD();
$simple = new simple();
$title = "clients";

$get = $simple->simple_get();
$sql = "SELECT * FROM clients WHERE ID = ". $get['ID'];

$arr['data']['clients'] = $bd->my_sql($sql)[0];