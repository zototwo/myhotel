<?
$bd = New BD();
$simple = New simple();

$title = "Просмотр комнат";

$get =  $simple->simple_get();
$id = $get['ID'];

$arr['rooms'] = $bd->my_sql("SELECT * FROM rooms WHERE ID = ".$get['ID'])[0];
$arr['rooms']['cat'] = $bd->my_sql("SELECT category.NAME FROM category WHERE category.ID = ".$arr['rooms']['ID_CATEGORY'])[0]['NAME'];
$arr['rooms']['ADDONS'] = $bd->my_sql("SELECT rooms.ID, addons.ID as addId, addons_option.ID as addons_id, addons_option.NAME as ADDONS_NAME,  addons.DATA as ADDONS_DATA FROM rooms
LEFT JOIN addons_option ON rooms.ID_CATEGORY = addons_option.ID_WHERE
LEFT JOIN addons ON (rooms.ID = addons.MASTER_ID AND addons.ID_ADDONS = addons_option.ID)
WHERE rooms.ID =  " . $get['ID']);

$arr['rooms']['PIC_PREV'] = $bd->my_sql("SELECT  gallery.* FROM `rooms` LEFT JOIN gallery ON rooms.PICTURE_PREV = gallery.ID WHERE rooms.ID = ". $get['ID'])[0];

$gallery = $bd->mt_sql_one_ret("SELECT rooms.GALLARY FROM rooms WHERE rooms.ID = 1")['GALLARY'];
$gallery = explode(',',$gallery);

$arr['rooms']['gallery'] = array();
 foreach($gallery as $val){
     array_push($arr['rooms']['gallery'],$bd->my_sql("SELECT gallery.SRC FROM gallery WHERE gallery.ID = ".$val)[0]);
 }

