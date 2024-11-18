<?php
require_once "./db.php";

class Fut {
    private $conn;

    public function __construct($conn) {
        $this->$conn = $conn;
    }
    function insertFut($izena){
        $sql = "INSERT INTO futbolista (izena) values ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $izena);

        $stmt->execute();
    }
    function fetch (){
        $sql2 = "SELECT * FROM futbolistak";
        $stmt2 = $this->conn->query($sql2);
        return $stmt2->fetchAll();
    }
}