<?php
$bd = new BD();
$simple = new simple();

$title = "rooms_edit";

$get = $simple->simple_get();
if($get['ID']!='New') {
    $arr['data']['rooms'] = $bd->my_sql("SELECT rooms.*, category.ID as CAT_NAME FROM rooms LEFT JOIN category ON rooms.ID_CATEGORY = category.ID  WHERE rooms.ID = " . $get['ID']);
    $arr['data']['rooms'] = $arr['data']['rooms'][0];
    if ($arr['data']['rooms'] == "") {
        $simple->eror404();
    }
    $arr['data']['rooms']['addons'] = $bd->my_sql("SELECT rooms.ID, addons.ID as addId, addons_option.NAME as ADDONS_NAME,  addons.DATA as ADDONS_DATA FROM rooms
                                            LEFT JOIN addons_option ON rooms.ID_CATEGORY = addons_option.ID_WHERE
                                            LEFT JOIN addons ON (rooms.ID = addons.MASTER_ID AND addons.ID_ADDONS = addons_option.ID)
                                            WHERE rooms.ID =  " . $get['ID']);

    /*
     * SELECT rooms.ID, addons.ID as addId, addons_option.NAME,  addons.DATA FROM rooms
                                            LEFT JOIN addons_option ON rooms.ID_CATEGORY = addons_option.ID_WHERE
                                            LEFT JOIN addons ON rooms.ID = addons.MASTER_ID
                                            WHERE rooms.ID = 9
     */
}