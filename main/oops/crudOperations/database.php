<?php
class Database{
    private $host="localhost";
    private $username="root";
    private $password="";
    private $database="database1";
    public $connect;
    public function conn(){
        $this->conn=mysqli_connect($this->host,$this->username,$this->password,$this->database);
        if(!$this->conn){
            die("Connection failed: " . mysqli_connect_error());
        }
        return $this->conn;
    }
}
?>