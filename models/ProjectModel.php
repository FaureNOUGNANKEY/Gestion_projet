<?php

    class Project {
        private $conn;
        public $id;
        public $title;
        public $description;
        public $owner_id ;
        public $membres;

        
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
                return true;
            }catch (Exception $e){
                return $e->getMessage();
            }
        }
        public function getAll(){
            try{
                $sql = 'SELECT * FROM PROJECTS ;';
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
                $stmt->execute(array($this->title,$this->description,$this->id));
                return true;
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
                return true;
            }catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function getByUser($user_id){
            try{
                $sql = "SELECT DISTINCT p.id, p.title, p.description, p.owner_id,
                        pu.role AS mon_role
                        FROM projects p
                        LEFT JOIN project_details pu ON pu.project_id = p.id AND pu.user_id = ?
                        WHERE p.owner_id = ? OR pu.user_id = ?
                        ORDER BY p.created_at DESC";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($user_id, $user_id, $user_id));
                return $stmt->fetchAll();
            }catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function getProjectMembers($project_id){
            try{
                $sql = "SELECT u.id, u.name, pu.role
                        FROM project_details pu
                        JOIN users u ON u.id = pu.user_id
                        WHERE pu.project_id = ?
                        LIMIT 5";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($project_id));
                return $stmt->fetchAll();
            }catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function addMember($project_id, $user_id, $role){
            try{
                $sql = "INSERT INTO project_details (project_id, user_id, role) VALUES (?, ?, ?);";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(array($project_id, $user_id, $role));
                return true;
            }catch (Exception $e) {
                return $e->getMessage();
            }
        }

    }
