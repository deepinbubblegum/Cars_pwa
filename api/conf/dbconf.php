<?php
    class Database
    {
        private $pdo;
        public function __construct($host, $dbname, $username, $password)
        {
            $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $con;
        }

        public function query($query_str)
        {
            $res = $this->pdo->prepare($query_str);
            $res->execute();
            if($query_str){
                $data = $res->fetchAll();
                return $data;
            }
        }
    }
    
?>