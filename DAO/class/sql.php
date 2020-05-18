<?php

    //Conecta
    class SQL extends PDO{
        private $conn;
        public function __construct(){
            $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7","root","");
        }

        private function setParams($statment, $parameters = array()){
            foreach($parameters as $ $key => $value){
                $stmt->bindparam($key, $value);
            }  
        }

        public function setParam($statment, $key, $value){
            $statment->bindparam($key, $value);
        }

        public function query($rawQuery, $params = array()){
            $stmt = $this->conn->prepare($rawQuery);
            $this->setParams($stmt, $params);
            return $stmt;
        }

        public function select($rawQuery, $params = array()):array
        {
            $stmt = $this->query($rawQuery, $params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>