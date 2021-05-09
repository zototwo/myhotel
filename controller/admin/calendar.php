<?php

$current_date = date("Y-m-d");

$bd = new BD();
$simple = new simple();

$title = "Calendar";

$sql = "SELECT orders.*, rooms.NUMBER, clients.NAME FROM `orders` LEFT JOIN rooms ON orders.ID_TO_ROOM = rooms.ID LEFT JOIN clients ON orders.ID_PERSON = clients.ID ORDER BY `rooms`.`NUMBER`, orders.DATA_FROM ASC";

$arr['data']['orders'] = $bd->my_sql($sql);



$get = $simple->simple_get();

$event_list = '';



$test = array();



if($get['button'] == 'free') {
    $link = explode('?',$simple->request_uri())[0];
    foreach($arr['data']['orders'] as $key => $val){
        if($val['NUMBER'] != $val[$key-1]['NUMBER'])
        {
            if(!is_array($test[$val['NUMBER']]))
                $test[$val['NUMBER']]=array();
            array_push($test[$val['NUMBER']],$val);
        }
    }
    foreach ($test as $val) {
        foreach ($val as $key => $value) {

            if ($key < count($val) - 1) {
                $event_list .= "{
                title: '" . $value['NUMBER'] . "',
                start:'" . $value['DATA_TO'] . "',
                end:'" . $val[$key + 1]['DATA_FROM'] . "'
            },";
            } else {
                $event_list .= "{
                title: '" . $value['NUMBER'] . "',
                start:'" . $value['DATA_TO'] . "',
                end:'" . date("Y-m-t", strtotime($value['DATA_TO'])) . "'
            },";
            }
        }
    }
}
else{
    $link = '?button=free';
    foreach($arr['data']['orders'] as $val){
        $event_list .= "{
            title: '".$val['NAME']."-".$val['NUMBER']."',
            start:'".$val['DATA_FROM']."',
            end:'".$val['DATA_TO']."'
        },";
    }
}

/*
    title = NUMBER; NAME
    start = DATA_FROM
    end =  DATA_TO
*/
