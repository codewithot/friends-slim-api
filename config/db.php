
<?php

class DB {
    private $host = 'localhost';
    private $user = 'codewithot';
    private $pass = 123456;
    private $dbname = 'slim-api';

//    create function to connect to the database
    public function connect(){
        $conn_str = "mysql:host=$this->host;dbname=$this->dbname";
        $conn = new PDO($conn_str, $this->user, $this->pass);
//        set attributes so the errors can be recorded properly
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
         

}

}