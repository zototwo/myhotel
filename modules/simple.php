<?php
namespace {
    class simple{
        function super_unique($array,$key)
        {
            $temp_array = [];
            if($array != "") {
                foreach ($array as &$v) {
                    if (!isset($temp_array[$v[$key]]))
                        $temp_array[$v[$key]] =& $v;
                }
                $array = array_values($temp_array);
                return $array;
            }
            else
                return 0;
        }
        function eror404(){
            http_response_code(404);
            readfile('template/404.html');
            die();
        }
        function showEROR($bool){
            if($bool) {
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
            }
            else{
                ini_set('display_errors', 0);
                ini_set('display_startup_errors', 0);
            }
        }

        function simple_get(){
            if(explode('?',$_SERVER['REQUEST_URI'])[1]!="") {
                $get = explode('&', explode('?', $_SERVER['REQUEST_URI'])[1]);
                foreach ($get as $i) {
                    $arr[explode('=', $i)[0]] = explode('=', $i)[1];
                }
            }
            else $arr = NULL;
            return $arr;
        }
    }
}
