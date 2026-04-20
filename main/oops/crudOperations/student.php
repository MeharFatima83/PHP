<?php
class User {
    public $conn = null;
    private $table = "student";
    public $id; 
    public $name = "null";
    public $mobile = "null";
    public $email = "null";

    public function __construct($db) {
        $this->conn = $db;    
    }

    // UPDATE Method 
    public function update() {
        $sql = "UPDATE $this->table SET name='$this->name', email='$this->email', mobile='$this->mobile' WHERE id='$this->id'";
        return mysqli_query($this->conn, $sql);
    }

    public function create() {
        $sql = "insert into $this->table (name,email,mobile) values('$this->name','$this->email','$this->mobile')";
        if(mysqli_query($this->conn, $sql)) {
            header("Location:read.php");
        } else {
            echo "can't connect";
        }
    }

    public function read() {
        $sql = "select * from $this->table";
        return mysqli_query($this->conn, $sql);
    }

    public function delete() {
        $sql = "delete from $this->table where id='$this->id'";
        return mysqli_query($this->conn, $sql);
    }

    public function edit() {
        $sql = "select * from $this->table where id='$this->id'";
        return mysqli_query($this->conn, $sql);
    }
}
?>
