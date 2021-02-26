<?php
$bd = new BD();
$simple = new simple();

$title = "Поиск";

if(!isset(explode('?',$_SERVER['REQUEST_URI'])[1]))
    $simple->eror404();
$arr = $simple->simple_get();

$sql = 'SELECT 
            rooms.*, orders.DATA_FROM, orders.DATA_TO
        FROM 
            rooms 
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


$arr['rooms'] = $bd->my_sql($sql);
$arr['data'] = $simple->super_unique($arr['rooms'],'ID');
unset($arr['rooms']);






//$arr['orders'] = $bd->my_sql("SELECT * FROM orders");
/*
 * SELECT * FROM rooms LEFT JOIN orders ON rooms.ID = orders.ID_TO_ROOM where $data1 < orders.DATA_FROM AND $data2 < orders.DATA_TO
 * дата заезда дата выезда . дата 1 и дата2 соответсвенно
 * ордера
 * нам нужно все комнаты у которых нет ордеров в промежутке дата1 и дата 2
 * это случается когда дата 1 и дата 2 меньше чем даты о ордера и когда дата 1 и дата 2 больше чем у ордера
 */



//$sql = 'SELECT rooms.*, orders.DATA_FROM, orders.DATA_TO FROM rooms LEFT JOIN orders ON  orders.ID_TO_ROOM = rooms.ID
//                                 WHERE   (\''.$arr['data1'].'\' < orders.DATA_FROM
//                                 AND     \''.$arr['data1'].'\' < orders.DATA_TO
//                                 AND     \''.$arr['data2'].'\' < orders.DATA_FROM
//                                 AND     \''.$arr['data2'].'\' < orders.DATA_TO)
//                                 OR      (\''.$arr['data1'].'\' > orders.DATA_FROM
//                                 AND     \''.$arr['data1'].'\' > orders.DATA_TO
//                                 AND     \''.$arr['data2'].'\' > orders.DATA_FROM
//                                 AND     \''.$arr['data2'].'\' > orders.DATA_TO)';
