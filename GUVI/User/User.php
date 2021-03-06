<?php
Class User {

    private $conn;
    private $table_name = "user";

    // object properties
    // constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }
	
	public function saveUserDetail() {
        $data = json_decode(file_get_contents('php://input'), true);
        $query = "INSERT INTO " . $this->table_name . " SET  FIRST_NAME=:FIRST_NAME,LAST_NAME=:LAST_NAME,AGE=:AGE,GMAIL=:GMAIL,CONTACT NO=:CONTACT_NO,PASSWORD=:PASSWORD";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->FIRST_NAME = htmlspecialchars(strip_tags($data["FIRST_NAME"]));
        $this->LAST_NAME = htmlspecialchars(strip_tags($data["LAST_NAME"]));
        $this->GMAIL = htmlspecialchars(strip_tags($data["GMAIL"]));
        $this->AGE = $data["AGE"];
        $this->CONTACT_NO = htmlspecialchars(strip_tags($data["CONTACT_NO"]));
        $this->PASSWORD = htmlspecialchars(strip_tags($data["PASSWORD"]));
        // bind values
        $stmt->bindParam(":FIRST_NAME", $this->FIRST_NAME);
        $stmt->bindParam(":LAST_NAME", $this->LAST_NAME);
        $stmt->bindParam(":GMAIL", $this->GMAIL);
        $stmt->bindParam(":CONTACT_NO", $this->CONTACT_NO);
        $stmt->bindParam(":AGE", $this->AGE);
        $stmt->bindParam(":PASSWORD", $this->PASSWORD);
        // execute query
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            //print_r($this->id);
            return true;
        } else {
            return false;
        }
       return false;
    }
	
}
?>