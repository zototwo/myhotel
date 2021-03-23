<?php
require '../modules/BD.php';
$bd = new BD();

    $uploaddir = $_SERVER['DOCUMENT_ROOT']."/media/gallery";


    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        foreach($_FILES as $val){
            print_r($val);
            
            if (move_uploaded_file($val['tmp_name'], $uploaddir.'/'.$val['name'])) {
                echo "1";
                $name_temp = $val['name'];
                $src_temp = '/media/gallery/'.$val['name'];
                $sql = "INSERT INTO gallery VALUES(NULL,'$name_temp','$src_temp')";
                print_r($sql);
                $bd->my_sql_one($sql);
            } else {
                echo "0";
            }
        }
    }
?>