<?php

$bd= new BD();

$title = "cat";

$sql = "SELECT * FROM category";

$arr['data'] = $bd->my_sql($sql);