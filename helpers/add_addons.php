<?php

require '../modules/BD.php';

$bd = new BD();

$add_name = $_GET['addons_name'];
$id_cat = $_GET['id_cat'];


$sql = "INSERT INTO `addons_option` (`ID`, `ID_WHERE`, `NAME`) VALUES (NULL, '$id_cat', '$add_name')";

$bd->my_sql_one($sql);