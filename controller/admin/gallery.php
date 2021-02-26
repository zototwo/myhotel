<?php
$bd = new BD();

$title = "Галлерея";

$arr['data']['img'] = $bd->my_read('gallery');