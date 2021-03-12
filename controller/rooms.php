<?php

$bd = new BD();
$simple = new simple();

$title = "Номера и услуги";



$get = $simple->simple_get();
if($get['CAT'] == 0){
    $sql = 'SELECT rooms.*, category.NAME as CAT_NAME FROM rooms LEFT JOIN category ON rooms.ID_CATEGORY = category.ID ';
}else{
    $sql = 'SELECT rooms.*, category.NAME as CAT_NAME FROM rooms LEFT JOIN category ON rooms.ID_CATEGORY = category.ID WHERE rooms.ID_CATEGORY = '.$get['CAT'];
}



$arr['data'] = $bd->my_sql($sql);
//$arr['data'] = $simple->super_unique($arr['rooms'],'ID');
//unset($arr['rooms']);
