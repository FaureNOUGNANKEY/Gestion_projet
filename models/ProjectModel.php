<?php

use FFI\Exception;

    class Project {
        private $conn;
        public $id;
        public $title;
        public $description;
        public $owner_id ;

        
        public function __construct($db){
            $this->conn = $db;
        }

        public function createProject(){
            try{
                $sql= 'INSERT INTO PROJECTS (title,description,owner_id) VALUES (?,?,?);';
                $stmt=$this->conn->prepare($sql);
                $stmt->execute(
                    array($this->title,$this->description,$this->owner_id)
                );
            }catch (Exception $e){
                return $e->getMessage();
            }
        }
        public function getAll(){
            try{
         )       $sql = 'SELECT * FROM PROJECTS ;';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(
                );
                return $stmt->fetchall();
            }catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function getById(){
            try{
                $sql = 'SELECT * FROM PROJECTS WHERE id=?;';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(
                    array($this->id)
                );
                return $stmt->fetch();
            }catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function updateProject(){
            try{
                $sql = 'UPDATE PROJECTS SET title=?, description=? WHERE id=?;';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(
                    array($this->title,$this->description,$this->id)
                );
            }catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function deleteProject(){
            try{
                $sql = 'DELETE FROM PROJECTS WHERE id=?;';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(
                    array($this->id)
                );
            }catch (Exception $e) {
                return $e->getMessage();
            }
        }

    }
