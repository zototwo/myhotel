<?php

$bd = new BD();
$simple = new simple();

$title = "Номера и услуги";




$sql = 'SELECT rooms.*, category.NAME as CAT_NAME FROM rooms LEFT JOIN category ON rooms.ID_CATEGORY = category.ID';


$arr['data'] = $bd->my_sql($sql);
//$arr['data'] = $simple->super_unique($arr['rooms'],'ID');
//unset($arr['rooms']);
