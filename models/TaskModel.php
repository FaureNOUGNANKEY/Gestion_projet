<?php
class Task {
    private $conn;
    public $id;
    public $title;
    public $description;
    public $status;
    public $project_id;
    public $assigned_to ;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createTask(){
        $sql ='INSERT INTO TASKS (title,description,status,project_id) VALUES (?,?,?,?)';
        $stmt= $this->conn->prepare($sql);
        $stmt->execute(
            array(
                $this->title,$this->description,
                $this->status,
                $this->project_id)
        );

    }
    public function updateTask(){
        $sql = 'UPDATE TASKS SET title=?, description=?, status=? WHERE id=?;';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(
            array(
                $this->title,
                $this->description,
                $this->status,
                $this->id
            )
        );
    }

    public function deleteTask(){
        $sql = 'DELETE FROM TASKS WHERE id=?;';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(
            array($this->id)
        );
    }

    public function getById()
    {
        $sql = 'SELECT * FROM TASKS WHERE id=?;';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(
            array($this->id)
        );
        return $stmt->fetch();
    }

    public function getByProjectId()
    {
        $sql = 'SELECT * FROM TASKS WHERE project_id=?;';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(
            array($this->project_id)
        );
        return $stmt->fetchAll();
    }

}
?>