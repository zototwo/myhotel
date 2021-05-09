<?php
$bd = new BD();
$simple = new simple();

$title = "Прайс-лист";

$sql = "SELECT * FROM category ORDER BY ID";

$catList = $bd->my_sql($sql);

$arr['data']['priceList'] = array();

//var_dump($arr['data']['priceList'][1]['NAME']);

$i=0;
foreach ($catList as $val)
{
    $sql = "SELECT rooms.PRICE FROM rooms WHERE rooms.ID_CATEGORY = ". $val['ID'];
    $temp = $bd->my_sql($sql);
//    var_dump($temp);
//    print_r('<br>');
    $min = PHP_INT_MAX;
    $max = 0;
    foreach ($temp as $i) {
        $min = min($min, $i['PRICE']);
        $max = max($max, $i['PRICE']);
    }

    //$arr['data']['priceList'][$i] = array("NAME"=>$i);

    $sql = "SELECT addons_option.NAME FROM addons_option WHERE addons_option.ID_WHERE =".$val['ID'];
    $temp = $bd->my_sql($sql);
    $str = "";
    foreach ($temp as $value){
        $str .= $value["NAME"].",";
    }

    array_push($arr['data']['priceList'],array("NAME"=>$val['NAME'],"PRICE_MIN"=>$min,"PRICE_MAX"=>$max,"ADDONS"=>$str));
    $i++;
}
