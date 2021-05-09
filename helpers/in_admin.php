<?php
require '../modules/BD.php';
require '../modules/simple.php';

$bd = new BD();
$simple = new simple();

$UserName = $_POST['inputName'];
$Pass = md5($_POST['inputPassword']);

$sql = "SELECT ID FROM users WHERE users.NAME = '$UserName' AND users.PASSWORD = '$Pass'";

$id = $bd->mt_sql_one_ret($sql);

if($id != NULL){

    setcookie("admins", "1", time()+60*60*24*30, '/');
    //$_COOKIE['admin'] = 1;
    //$_SESSION['argc'] = array();
    //array_push($_SESSION['argc'],'1');
    echo("true");
}
else{
    echo("false");
}