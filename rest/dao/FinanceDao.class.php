<?php

class FinanceDao{

    private $conn;

    /*constructor of dao class
     */
    public function __construct(){

    $servername = "localhost";
    $username = "financetracker";
    $password = "financetracker";
    $schema = "finance";
    $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

    /* METHOD Read all files from db */
    public function get_all(){
        $stmt = $this->conn->prepare("SELECT * FROM finances");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /* METHOD Read one file from db */
    public function get_by_id($id){
        $stmt = $this->conn->prepare("SELECT * FROM finances WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return @reset($result);
    }

    /* METHOD Inserting files intop the db */
    public function add($finance){
        $stmt = $this->conn->prepare("INSERT INTO finances (description, created) VALUES (:description, :created)");
        $stmt->execute($finance);
        $finance['id'] = $this->conn->lastInsertId();
        return $finance;
    }

    /* Delete recorf from db */
    public function delete($id){
        $stmt = $this->conn->prepare("DELETE from finances where id=:id");
        $stmt->bindParam(':id',$id); //sql injection prevention
        $stmt->execute();
    }
    /*Update finance records in db */
    public function update($id, $description, $created){
        $stmt = $this->conn->prepare("UPDATE finances SET description=:description, created=:created WHERE id=:id");
        $stmt->execute(['id'=> $id, 'description' => $description, 'created' => $created]);
    }
}

?>