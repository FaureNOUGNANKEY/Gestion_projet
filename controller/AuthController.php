<?php
include __DIR__ . '/../config.php';
include __DIR__ . '/../models/UserModel.php';

$conn = new Connection();
$db = $conn->getConnection();

function register($db) {
    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        $user = new User($db);
        $user->name = htmlspecialchars(trim($_POST['nom']));
        $user->email= htmlspecialchars(trim($_POST['email']));
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $result = $user->createUser();

        if ($result === true) {
            $msg = "Inscription réussie";
            header('Location: login.php?msg='.$msg);
            exit();
        } else {
            return $result;
        }

    } else {
        $msg="Veuillez remplir tous les champs.";
        return $msg;
    }
}

function login($db) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $user = new User($db);
        $user->email = htmlspecialchars(trim($_POST['email']));
        $user->password = htmlspecialchars(trim($_POST['password']));

        $result = $user->findByEmail();

        if ($result && password_verify($_POST['password'], $result['password'])) {
            $_SESSION['user_id']    = $result['id'];
            $_SESSION['user_name']  = $result['name'];
            $_SESSION['user_email'] = $result['email'];
            $_SESSION['user_role']  = $result['role'];

            header('Location: ../dashboard.php');
            exit();
        } else {
            $msg = "Email ou mot de passe incorrect.";
            header('Location: login.php?msg='.$msg);
            exit();
        }

    } else {
        $msg = "Veuillez remplir tous les champs.";
        header('Location: login.php?msg='.$msg);
        exit();
    }
}

function logout($db){
    session_destroy();
    header('Location: login.php');
    exit();
}


// Routing : on appelle la bonne fonction selon l'action
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
        if ($_POST['action'] === 'register') {
            $msg = register($db);

        } elseif ($_POST['action'] === 'login') {
            $msg = login($db);
        }elseif ($_POST['action']==='logout'){
            $msg = logout($db);
        }
    
}
?>