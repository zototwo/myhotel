<?php

$bd = new BD();
$simple = new simple();

$title = "cat_edit";

$get = $simple->simple_get();

if($get['ID'] == 'New'){

}
else{
    $sql = "SELECT * FROM category WHERE ID = ".$get['ID'];
    $arr['data'] = $bd->my_sql($sql)[0];
}

$rewrite = $simple->request_uri();
