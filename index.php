<?
define('LIB_DIR', __DIR__ . '/modules/');

spl_autoload_register(function($class) {

    $a = explode('\\', $class);
    $last = array_pop($a);
    $fn =  $last . '.php';
    $fn = LIB_DIR . str_replace('\\', '/', $fn);

    if (file_exists($fn)) require $fn;
});




    $route = new route();
    $loader = new loader();
    $simple = new simple();

    $simple->showEROR(true);

    if($route->is_admin()){

        //var_dump($_COOKIE);

        if($_COOKIE['admins'] != "1" && $simple->request_uri() != "/admin/in_admin")
            header('Location: /admin/in_admin');
    }

    $loader->render($route->get_route());


