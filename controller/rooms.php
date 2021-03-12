<?php

$bd = new BD();
$simple = new simple();

$title = "Номера и услуги";



$get = $simple->simple_get();
if($get['CAT'] == 0){
    if(!isset($get['data1']) && !isset($get['data2'])){
        $sql = 'SELECT rooms.*, category.NAME as CAT_NAME FROM rooms LEFT JOIN category ON rooms.ID_CATEGORY = category.ID ';
    }
    else{
        $sql = 'SELECT
            rooms.*, orders.DATA_FROM, orders.DATA_TO, category.NAME as CAT_NAME
        FROM
            rooms
        LEFT JOIN category ON rooms.ID_CATEGORY = category.ID
        LEFT JOIN
             orders
             ON (
                 orders.ID_TO_ROOM = rooms.ID AND
                 NOT (
                     (orders.DATA_FROM < \''.$get['data1'].'\' and orders.DATA_TO < \''.$get['data1'].'\')
                     OR
                     (orders.DATA_FROM  > \''.$get['data2'].'\' and orders.DATA_TO > \''.$get['data2'].'\')
                     )
                )
        WHERE
            orders.ID_TO_ROOM IS NULL;';
    }
}else{
    if(!isset($get['data1']) && !isset($get['data2'])){
        $sql = 'SELECT rooms.*, category.NAME as CAT_NAME FROM rooms LEFT JOIN category ON rooms.ID_CATEGORY = category.ID WHERE rooms.ID_CATEGORY = '.$get['CAT'];
    }
    else{
        $sql = 'SELECT
            rooms.*, orders.DATA_FROM, orders.DATA_TO, category.NAME as CAT_NAME
        FROM
            rooms
        LEFT JOIN category ON rooms.ID_CATEGORY = category.ID
        LEFT JOIN
             orders
             ON (
                 orders.ID_TO_ROOM = rooms.ID AND
                 NOT (
                     (orders.DATA_FROM < \''.$get['data1'].'\' and orders.DATA_TO < \''.$get['data1'].'\')
                     OR
                     (orders.DATA_FROM  > \''.$get['data2'].'\' and orders.DATA_TO > \''.$get['data2'].'\')
                     )
                )
        WHERE
            orders.ID_TO_ROOM IS NULL
            AND rooms.ID_CATEGORY = '.$get['CAT'];

    }
}



$arr['data'] = $bd->my_sql($sql);
$rooms = explode('?', $simple->request_uri())[0];
$action = $simple->request_uri();
$cat = $get['CAT'];
foreach ($arr['data'] as $key=>$val){
    $id = $val['ID'];
    $arr['data'][$key]['ADDONS'] = $bd->my_sql("SELECT rooms.ID, addons.ID as addId, addons_option.ID as addons_id, addons_option.NAME as ADDONS_NAME,  addons.DATA as ADDONS_DATA FROM rooms
                                            LEFT JOIN addons_option ON rooms.ID_CATEGORY = addons_option.ID_WHERE
                                            LEFT JOIN addons ON (rooms.ID = addons.MASTER_ID AND addons.ID_ADDONS = addons_option.ID)
                                            WHERE rooms.ID =  " . $id);
}
//print_r($arr['data']);
//$arr['data'] = $simple->super_unique($arr['rooms'],'ID');
//unset($arr['rooms']);

/*
 * $sql = 'SELECT rooms.*, category.NAME as CAT_NAME FROM rooms LEFT JOIN category ON rooms.ID_CATEGORY = category.ID ';
 *
 *     $sql = 'SELECT
            rooms.*, orders.DATA_FROM, orders.DATA_TO, category.NAME as CAT_NAME
        FROM
            rooms
        LEFT JOIN category ON rooms.ID_CATEGORY = category.ID
        LEFT JOIN
             orders
             ON (
                 orders.ID_TO_ROOM = rooms.ID AND
                 NOT (
                     (orders.DATA_FROM < \''.$get['data1'].'\' and orders.DATA_TO < \''.$get['data1'].'\')
                     OR
                     (orders.DATA_FROM  > \''.$get['data2'].'\' and orders.DATA_TO > \''.$get['data2'].'\')
                     )
                )
        WHERE
            orders.ID_TO_ROOM IS NULL;';
 * $sql = 'SELECT
            rooms.*, orders.DATA_FROM, orders.DATA_TO, category.NAME as CAT_NAME
        FROM
            rooms
        LEFT JOIN category ON rooms.ID_CATEGORY = category.ID
        LEFT JOIN
             orders
             ON (
                 orders.ID_TO_ROOM = rooms.ID AND
                 NOT (
                     (orders.DATA_FROM < \''.$arr['data1'].'\' and orders.DATA_TO < \''.$arr['data1'].'\')
                     OR
                     (orders.DATA_FROM  > \''.$arr['data2'].'\' and orders.DATA_TO > \''.$arr['data2'].'\')
                     )
                )
        WHERE
            orders.ID_TO_ROOM IS NULL;';
 */