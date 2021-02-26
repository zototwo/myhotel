<?php
$title = "rooms";

$bd = new bd();

$sql = "SELECT rooms.*, category.NAME as CAT_NAME FROM rooms LEFT JOIN category ON rooms.ID_CATEGORY = category.ID";

$arr['data']['rooms'] = $bd->my_sql($sql);
