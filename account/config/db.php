<?php
 ob_start();
 session_start();
    class Database{
        private $con;
        private $server = "localhost";
        private $username = "root";  /// root
        private $password = "";  /// ""
        private $dbname = "bank";  // db name
     
        public function connect(){
            try{
                $this->con = new PDO('mysql:host='.$this->server.';dbname='.$this->dbname,$this->username,$this->password);
                $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                 return $this->con;
            }catch(PDOExecption $e){

                echo 'connection issue'. $e->getMessage;

            }
        }  
    }


?>