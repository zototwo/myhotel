<?php



require '../modules/BD.php';

$bd = new BD();
$add =[];

if($_GET['id_rooms'] != 'New'){
    //Update id_rooms, cat_name, number_room, price_room, text_full, text_prev
    //Update aaons

    //Update main informnation
    $sql = "UPDATE rooms SET ID_CATEGORY = '".$_GET['cat_name']."', NUMBER = '".$_GET['number_room'].
        "',PRICE = '".$_GET['price_room']."',TEXT_FULL = '".$_GET['text_full']."',TEXT_PREV = '".$_GET['text_prev']."' WHERE ID = '".$_GET['id_rooms']."'";
    $bd->my_sql_one($sql);
    //Update addons option
    foreach ($_GET as $key=>$value){ //Составляем карту дополнительных опций, если есть ид то обновляем если нет то добавляем
        if(explode('_',$key)[0] == 'add'){
            $temp = explode('_',$key)[1];

            array_push($add,array('id'=>explode('/',$temp)[0],'addons_id'=>explode('/',$temp)[1],'value'=>$value));
        }
    }
    foreach ($add as $value){
        if($value['id'] > 0 ){
            $sql = "UPDATE addons SET DATA = '".$value['value']."' WHERE ID = '".$value['id']."'";
        }else{
            if($value['value'] != "")
                $sql = "INSERT INTO addons (`ID`, `ID_ADDONS`, `MASTER_ID`, `DATA`) VALUES (NULL, '".$value['addons_id']."', '".$_GET['id_rooms']."', '".$value['value']."')";
        }
        $bd->my_sql_one($sql);
    }
}elseif($_GET['id_rooms']=='New'){
    //Create INSERT INTO rooms VALUES (NULL,'12','402','123456','321','123',1,CURRENT_DATE,CURRENT_DATE,0,0)
    //Create addons empty ' '
    $data = 'NULL,'.$_GET['cat_name'].','.$_GET['number_room'].','.$_GET['price_room'].','.$_GET['text_full'].','.$_GET['text_prev'].',1,CURRENT_DATE,CURRENT_DATE,0,0';
    $test = $bd->my_inject($data,'rooms');
}