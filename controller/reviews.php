<?php

$bd = new BD();
$simple = new simple();

$title = "Отзывы";

$sql = "SELECT * FROM reviews WHERE TO_SHOW = 1";

$arr['data'] = $bd->my_sql($sql);

//print_r($arr);