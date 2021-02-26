<?php
$bd = new BD();

$title = "clients";

$arr['data']['clients'] = $bd->my_read("clients");
