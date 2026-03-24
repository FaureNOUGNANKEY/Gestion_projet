<?php 
    include __DIR__ . '/../models/ProjectModel.php';
    include __DIR__ . '/../config.php';

    $conn = new Connection();
    $db = $conn->getConnection();

    function create($db){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!empty($_POST['title']) && !empty($_POST['description'])&& !empty($_POST['owner_id'])){
                $p = new Project($db);

                $p->title = htmlspecialchars(trim($_POST['title']));
                $p->description = htmlspecialchars(trim($_POST['description']));
                $p->owner_id = htmlspecialchars(trim($_POST['owner_id']));

                $result = $p->createProject();
                if ($result === true) {
                    $msg = "Projet créer";
                    header('Location: create.php?msg='.$msg);
                    exit();
                } else {
                    return $result;
                }

            }else{
                $msg='veilleiz remplir tous les champs';
                return $msg;
            }
        }

    }