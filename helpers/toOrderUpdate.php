<?php
require '../modules/BD.php';
require '../modules/simple.php';

$bd = new BD();
$simple = new simple();

//var_dump($_POST);

if($_POST['action'] == 'updateAVA'){
    $sql = "UPDATE orders SET Availability = NOT Availability WHERE ID = ". $_POST['id'];
    $bd->my_sql_one($sql);
    echo '1';
}

if($_POST['action'] == 'delete_order'){
    $sql = "DELETE FROM orders WHERE ID = ". $_POST['id'];
    $bd->my_sql_one($sql);
    echo '1';
}

if($_POST['action'] == 'update_order'){
//    var_dump($_POST);
    $data = $_POST['data'];
    $data = explode('&', $data);
    $data1['id'] = $_POST['id'];
    foreach ($data as $key=>$val){
        $temp = explode('=',$val);
        $data1[$temp[0]] = $temp[1];
    }
    $data1['ava'] = ($data1['ava']=='on')?1:0;

    $sql = "SELECT rooms.ID FROM rooms WHERE rooms.NUMBER = ". $data1['number_room'];
    $id_rooms = $bd->mt_sql_one_ret($sql)['ID'];

    $sql = "UPDATE orders SET ".
        "orders.COMMENT = ".$data1['client_comment'].
        ", orders.ID_TO_ROOM = '$id_rooms'".
        ", orders.DATA_FROM = '".$data1['data_from'].
        "', orders.DATA_TO = '".$data1['data_to'].
        "' WHERE orders.ID = " .$data1['id'];

    $bd->my_sql_one($sql);
    echo '1';

}