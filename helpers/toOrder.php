<?php
print_r($_GET);

require '../modules/BD.php';

$bd = new BD();

//создаем заявку в БД
//сначала создаем пользователя, проверка по номеру телефона если существует номер и совпадает имя привязываем ордер к этому пользователю без создание нового
//создаем ордер
$rooms = $_GET['room_number'];
$name = $_GET['name_person'];
$phone = $_GET['person_phone'];
$comment = $_GET['person_text'];
$data1 = $_GET['data1'];
$data2 = $_GET['data2'];

if($_GET['room_number']!=NULL && $_GET['name_person']!=NULL)
{

    //создаем запись в таблице клиентов

    $id_clients = $bd->my_sql("SELECT clients.ID FROM clients WHERE clients.PHONE = '$phone'")[0]['ID']?$bd->my_sql("SELECT clients.ID FROM clients WHERE clients.PHONE = '$phone'")[0]['ID']:($bd->my_inject("NULL,'".$name."','".$phone."',''",'clients'));
    $room_id = $bd->my_sql("SELECT ID FROM `rooms` WHERE `NUMBER` = '$rooms'")[0]['ID'];
    $id_orders = ($bd->my_inject("NULL,0,'".$id_clients."','".$comment."','".$room_id."','".$data1."','".$data2."'",'orders'));

    //SELECT clients.ID FROM clients WHERE clients.PHONE = '3'
    //создаем запись в таблице ордеров
    // "NULL,0'".$name."','".$phone."',''"

}