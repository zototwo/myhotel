<?
define('LIB_DIR', __DIR__ . '/modules/');

spl_autoload_register(function($class) {

    $a = explode('\\', $class);
    $last = array_pop($a);
    $fn =  $last . '.php';
    $fn = LIB_DIR . str_replace('\\', '/', $fn);

    //echo '<b>autoload: ' . $class . '</b> file: ' . $fn . '<br>';

    if (file_exists($fn)) require $fn;
});




    $route = new route();
    $loader = new loader();
    $simple = new simple();

    $simple->showEROR(true);

    $loader->render($route->get_route());


