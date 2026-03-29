<?php 
    //include_once __DIR__ . '/../config.php';
    include_once __DIR__ . '/../includes/header.php';
    include_once __DIR__ . '/../models/UserModel.php';

    $conn = new Connection();
    $db = $conn->getConnection();

    function listUsers($db){
        $user = new User($db);
        return $user->getAll();
    }

    function getUserById($db, $id){
        $user = new User($db);
        $user->id = $id;
        return $user->findByid();
    }
    function deleteUser($db, $id){
        $user = new User($db);
        $user->id = $id;
        $result = $user->deleteUser();
        if ($result) {
            header('Location: list.php?msg=Utilisateur supprimé avec succès');
            exit();
        } else {
            return "Erreur lors de la suppression";
        }
    
    }
    function updateUser($db) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
            if (!empty($_POST['name']) && !empty($_POST['email'])&& !empty($_POST['role'])) {
                $user = new User($db);
                $user->name = htmlspecialchars(trim($_POST['name']));
                $user->email= htmlspecialchars(trim($_POST['email']));
                $user->role = htmlspecialchars(trim($_POST['role']));
                $user->id = $_POST['id'];

                $result = $user->updateUser();

                if ($result === true) {
                    $msg = "Modification réussie";
                    header('Location: list.php?msg='.$msg);
                    exit();
                } else {
                    return $result;
                }

            } else {
                $msg="Veuillez remplir tous les champs.";
                return $msg;
            }
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
        if ($_POST['action'] === 'update') {
            $msg = updateUser($db);
        }
        if ($_POST['action'] === 'delete') {
            deleteUser($db, $_POST['id']);
        }
    }

    

    

