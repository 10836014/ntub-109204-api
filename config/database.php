<?php
class Database{
 
    // specify your own database credentials
    private $host = "us-cdbr-east-02.cleardb.com";
    private $db_name = "heroku_4b25007c650d0dd";
    private $username = "bbb9298efa9b93";
    private $password = "5f62769a";
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