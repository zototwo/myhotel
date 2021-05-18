<?php
$bd = new BD();
$simple = new simple();

$title = "Авторизация";


$no_passw = false;
$arr['data']['get']['inputName'] = $_POST['inputName'];
$arr['data']['get']['inputPassword'] = $_POST['inputPassword'];
$phone = $arr['data']['get']['inputName'];

if($arr['data']['get']['inputName']!="" && $arr['data']['get']['inputPassword']==""){
    $sql = "SELECT clients.MAIL FROM clients WHERE clients.PHONE =".$arr['data']['get']['inputName'];
    $temp = $bd->my_sql($sql)[0]['MAIL'];
    $passw = $simple->generate_pass($arr['data']['get']['inputName']);
    mail($temp,"Пароль",$passw,"From: myhotel@mail.lc");
}

if($arr['data']['get']['inputPassword']!=""){

    $sql = "SELECT ID,PASSWORD FROM clients WHERE clients.PHONE = ".$arr['data']['get']['inputName'];
    $id = $bd->my_sql($sql)[0]['ID'];
    $password = $bd->my_sql($sql)[0]['PASSWORD'];

    if($password == $arr['data']['get']['inputPassword']) {
        setcookie("person", $id, time() + 60 * 60 * 24 * 30, '/');
        header("Location: /person");
    }
    else{
        $no_passw = true;
    }
}

//var_dump($arr);