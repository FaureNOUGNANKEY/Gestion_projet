<?php 
    include_once __DIR__ . '/../models/ProjectModel.php';
    include_once __DIR__ . '/../config.php';

    $conn = new Connection();
    $db = $conn->getConnection();

    function create($db){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!empty($_POST['title']) && !empty($_POST['description'])&& !empty($_POST['owner_id'])){
                $p = new Project($db);

                $p->title = htmlspecialchars(trim($_POST['title']));
                $p->description = htmlspecialchars(trim($_POST['description']));
                $p->owner_id = htmlspecialchars(trim($_SESSION['user_id']));

                $result = $p->createProject();
                if ($result === true) {
                    $msg = "Projet créé";
                    header('Location:list.php?msg='.$msg);
                    exit();
                } else {
                    return $result;
                }

            }else{
                $msg='Veuillez remplir tous les champs';
                return $msg;
            }
        }
    }

    function getList($db, $user_id){
        $project = new Project($db);
        $projets = $project->getByUser($user_id);
        if (is_array($projets)) {
            foreach ($projets as &$projet) {
                $projet['membres'] = $project->getProjectMembers($projet['id']);
                $projet['role_affiche'] = ($projet['owner_id'] == $user_id) ? 'Admin' : ucfirst($projet['mon_role'] ?? 'Membre');
            }
        }
        
        return $projets;
    }


    if (isset($_POST['action']) && $_POST['action'] === 'create') {
        $msg = create($db);
    }