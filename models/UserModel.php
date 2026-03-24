<?php

//use FFI\Exception;

class User {
    private $conn;
    //private $table = "users";
    public $name;
    public $email;
    public $password;
    public $id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createUser() {
        try {
            $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);

            return $stmt->execute([
                $this->name,
                $this->email,
                $this->password
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function findByEmail() {
        try {
            $sql = "SELECT * FROM users WHERE email = ?;";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$this->email]);
            return $stmt->fetch();
        } catch (Exception $e) {
            return false;
        }
    }
    public function findByid() {
        try {
            $sql = "SELECT * FROM users WHERE id = ?;";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$this->id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            return false;
        }
    }

    public function getAll(){
        try{
            $sql = 'SELECT * FROM USERS ;';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
            );
            return $stmt->fetchall();
        }catch (Exception $e) {
            die("ERREUR". $e->getMessage());
        }
    }

    public function updateUser(){
        try{
            $sql = 'UPDATE USERS SET name=?, email=? , password=? where id=?;';
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(
                array($this->id)
            );
        }catch (Exception $e){
            die("ERREUR". $e->getMessage());
        }
    }

    public function deleteUser(){
        try{
            $sql = 'DELETE FROM USERS WHERE id=?;';
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(
                array($this->id)
            );
        }catch (Exception $e){
            die("ERREUR". $e->getMessage());
        }   
    }
}
?>