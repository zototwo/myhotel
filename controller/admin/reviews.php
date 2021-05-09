<?php
$bd = new BD();

$sql = "SELECT * FROM reviews";

$arr['data'] = $bd->my_sql($sql);