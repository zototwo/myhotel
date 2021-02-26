<?php

class loader extends simple {

    public function render($path)
    {

        include_once 'modules/settings.php';
        if(explode('/',$path['action'])[1] == 'admin'){
            include_once 'controller/admin/settings.php';
        }
        include_once 'controller/'.$path['controller'].'.php'; // подгружаем контроллер

        if(explode('/',$path['action'])[1] == 'admin')
            include_once('template/admin/header.html'); //загружаем header
        else if(explode('/',$path['action'])[0] == 'template')
            include_once('template/header.html'); //загружаем header


        if (file_exists($path['action'])) { //если файл существует то загружаем его
            include_once $path['action'];
        } else {
            parent::eror404();
        }


        if(explode('/',$path['action'])[1] == 'admin')
            include_once('template/admin/footer.html'); //загружаем footer
        else
            include_once('template/footer.html'); //загружаем footer

    }
}
