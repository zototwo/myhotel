<?php
namespace {
    class BD{
        private $hostname = "127.0.0.1";
        private $database = "myhotel";
        private $username = "user";
        private $password = "7";
        public $con;
        function __construct()
        {
            $this->con = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        }

        public function my_print(){
            return "lol";
        }
        //----------Читаем все что находится в таблице
        public function my_read($bd){
            $value = [];
            $sql = "SELECT * FROM ".$bd;
          if($this->con->query($sql)) {
              $result = $this->con->query($sql);
              $i=0;
              while ($row = $result->fetch_assoc()) {
                  foreach ($row as $key=>$val)
                      $value[$i][$key] = $val;
                  $i++;
              }
          }
          else $result = "faild";
        return $value;
        }

        //----------Запрос sql к бд
        public function my_sql($sql){
            if($this->con->query($sql)) {
                $result = $this->con->query($sql);
                $i=0;
                while ($row = $result->fetch_assoc()) {
                        foreach ($row as $key => $val)
                            $value[$i][$key] = $val;
                        $i++;
                }
            }
            else $result = "faild";
            return $value;
        }

        //-------вставка данных в таблицу
        public function my_inject($data,$table){
            //INSERT INTO `orders` VALUES (NULL, '1', '0', '9', '2021-02-21', '2021-03-31')
            $sql = "INSERT INTO $table VALUES ($data)";
            $this->con->query($sql);
            return $this->con->insert_id?$this->con->insert_id:1;
        }

        public function my_sql_one($sql){
            if($this->con->query($sql)) {
                $result = $this->con->query($sql);
            }
            else $result = "faild";
            return $result;
        }
    }
}
