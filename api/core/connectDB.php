<?php

    class connectDB{
        public $conn;
        private $serverName="localhost";
        private $username="root";
        private $password="";
        private $dbname="ql_kho";

        public function __construct(){
            $this->conn = mysqli_connect($this->serverName, $this->username, $this->password);
            mysqli_select_db($this->conn, $this->dbname);
            mysqli_query($this->conn,"SET NAMES 'utf8'");
        }
    }

?>