<?php
namespace {
    class simple extends BD{
        public $admin;
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
        function request_uri(){
            return $_SERVER['REQUEST_URI'];
        }
        function y_admin(){

            $this->admin = true;
        }
        function generate_pass($phone){
            $password = '';
            $arr = array(
                'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
                'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
                'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
                'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
                '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
            );

            for ($i = 0; $i < 5; $i++) {
                $password .= $arr[random_int(0, count($arr) - 1)];
            }
            $sql = "UPDATE clients SET PASSWORD = '$password' WHERE clients.PHONE = ".$phone;
            $this->my_sql_one($sql);
            return $password;
        }
    }
}
