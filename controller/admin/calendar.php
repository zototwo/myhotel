<?php

$current_date = date("Y-m-d");

$bd = new BD();
$simple = new simple();

$title = "Calendar";

$sql = "SELECT orders.*, rooms.NUMBER, clients.NAME FROM `orders` LEFT JOIN rooms ON orders.ID_TO_ROOM = rooms.ID LEFT JOIN clients ON orders.ID_PERSON = clients.ID";

$arr['data']['orders'] = $bd->my_sql($sql);


//print_r($arr['data']['orders']);

$event_list = '';

foreach($arr['data']['orders'] as $val){
    $event_list .= "{
        title: '".$val['NAME']."-".$val['NUMBER']."',
        start:'".$val['DATA_FROM']."',
        end:'".$val['DATA_TO']."'
    },";
}
/*
    title = NUMBER; NAME
    start = DATA_FROM
    end =  DATA_TO
*/
