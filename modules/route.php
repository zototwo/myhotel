<?php

class route extends simple {
    private $route;
    private $main_route = array( // массив с роутерами из адреснной строки
        ''=>array(
            'controller' => 'index',
            'action' => 'template/index.html'
        ),
        'test'=>array(
            'controller' => 'test',
            'action' => 'template/test.html'
        ),
        'index'=>array(
            'controller' => 'index',
            'action' => 'template/index.html'
        ),
        'main'=>array(
            'controller' => 'index',
            'action' => 'template/index.html'
        ),
        'admin'=>array(
            'controller' => 'admin',
            'action' => 'template/admin/index.html'
        ),
        'search'=>array(
            'controller' => 'search',
            'action' => 'template/search.html'
        ),
        'rooms'=>array(
            'controller' => 'rooms',
            'action' => 'template/rooms.html'
        ),
        'viewroom'=>array(
            'controller' => 'viewroom',
            'action' => 'template/viewroom.html'
        ),
        'o_nas'=>array(
            'controller' => 'template',
            'action' => 'template/o_nas.html'
        ),
        'contacs'=>array(
            'controller' => 'template',
            'action' => 'template/contacs.html'
        ),
        'admin/calendar'=>array(
            'controller' => 'admin/calendar',
            'action' => 'template/admin/calendar.html'
        ),
        'admin/orders'=>array(
            'controller' => 'admin/orders',
            'action' => 'template/admin/orders.html'
        ),
        'admin/clients'=>array(
            'controller' => 'admin/clients',
            'action' => 'template/admin/clients.html'
        ),
        'admin/rooms'=>array(
            'controller' => 'admin/rooms',
            'action' => 'template/admin/rooms.html'
        ),
        'admin/rooms_edit'=>array(
            'controller' => 'admin/rooms_edit',
            'action' => 'template/admin/rooms_edit.html'
        ),
        'admin/orders_edit'=>array(
            'controller' => 'admin/orders_edit',
            'action' => 'template/admin/orders_edit.html'
        ),//
        'admin/clients_edit'=>array(
            'controller' => 'admin/clients_edit',
            'action' => 'template/admin/clients_edit.html'
        ),
        'admin/gallery'=>array(
            'controller' => 'admin/gallery',
            'action' => 'template/admin/gallery.html'
        ),
        'admin/category'=>array(
            'controller' => 'admin/category',
            'action' => 'template/admin/category.html'
        ),
        'admin/cat_edit'=>array(
            'controller' => 'admin/cat_edit',
            'action' => 'template/admin/cat_edit.html'
        ),
    );
    function __construct()
    {
        $this->route = isset($_GET['route']) ? $_GET['route'] : null;
    }
    function get_route(){

        $path = $this->route;
        if($this->main_route[$path]['controller']=='') { //если контроллера не существует то отадем 404
            parent::eror404();
        }

        return $this->main_route[$path];
    }
}