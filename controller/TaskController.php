<?php 
    include_once . __DIR__ . '/../models/TaskModel.php';
    include_once . __DIR__ . '/../config.php';
    $conn = new Connection();
    $db = $conn->getConnection();   


    function createTask($db){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['status'])&& !empty($_POST['project_id'])){
                $t = new Task($db);

                $t->title = htmlspecialchars(trim($_POST['title']));
                $t->description = htmlspecialchars(trim($_POST['description']));
                $t->status = htmlspecialchars(trim($_POST['status']));
                $t->project_id = htmlspecialchars(trim($_POST['project_id']));
                $t->id = htmlspecialchars($_POST['id']);
                
                $result = $t->createTask();
                if ($result === true){
                    $msg = "Tache crée avec succès";
                    header('location:detail.php?msg='.$msg);
                }else{
                    return $result ;
                }
            }else {
                $msg = "veillez remplir tous les champs ";
            }
        }
    }

    function updateTask($db){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['status'])&& !empty($_POST['project_id'])){
                $t = new Task($db);

                $t->title = htmlspecialchars(trim($_POST['title']));
                $t->description = htmlspecialchars(trim($_POST['description']));
                $t->status = htmlspecialchars(trim($_POST['status']));
                $t->project_id = htmlspecialchars(trim($_POST['project_id']));
                $t->id = htmlspecialchars($_POST['id']);

                $result = $t->updateTask();
                if ($result === true){
                    $msg = "Modiffication réussie";
                    header('location:detail.php?msg='.$msg);
                    exit();
                }else{
                    return $result ;
                }
            }else {
                $msg = "veillez remplir tous les champs ";
            }
        }
    }

    function deleteTask($db , $id){
        $t = new Task($db);
        $t->id = $id;
        $result = $t->deleteTask();
        if ($result  == true){
            header('location:');
            exit();
        }else{
            return "erreur lors de la suppression";
        }
    }

    function getTastsByProject($db, $project_id){
        $t = new Task($db);    
        $t->project_id = $project_id;      
        return $t->getByProjectId();
    }





?>