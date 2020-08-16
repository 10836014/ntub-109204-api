<?php
class Database{
 
    // specify your own database credentials
    private $host = "us-cdbr-east-02.cleardb.com";
    private $db_name = "heroku_5e33d8f743b0bb4";
    private $username = "bb2a181ef54d3c";
    private $password = "4b8d604d";
    public $conn;
 

    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
        return 'connect seccess';
    }
}
?>