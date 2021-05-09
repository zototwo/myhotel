<?php
require '../modules/BD.php';

$bd = new BD();


if($_GET['action']=='insert') {
    $fio = $_GET['FIO'];
    $textComment = $_GET['textComment'];
    $raiting = $_GET['raiting'];

    $sql = "INSERT INTO reviews VALUES (NULL, '$fio', '$textComment', CURRENT_DATE(), '$raiting', '0');";

    $bd->my_sql_one($sql);
}
elseif($_GET['action']=='update'){
    $id = $_GET['id'];
    $show = ($_GET['show']=='true')?1:0;
    $sql = "UPDATE reviews SET TOSHOW = '$show' WHERE ID='$id'";
    $bd->my_sql_one($sql);
    //UPDATE `reviews` SET `TOSHOW` = '0' WHERE `reviews`.`ID` = 1;
}