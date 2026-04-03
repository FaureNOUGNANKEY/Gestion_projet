<?php 
include_once __DIR__ . '/../controller/AuthController.php';
include_once __DIR__ . '/../includes/auth_check.php';

?>
<?php
function getInitiales($nom) {
    $mots = explode(' ', trim($nom));
    $initiales = '';
    foreach ($mots as $mot) {
        $initiales .= strtoupper(mb_substr($mot, 0, 1));
    }
    return substr($initiales, 0, 2);
}

$userName = $_SESSION['user_name'] ;
$userRole = $_SESSION['user_role'] ;
$initiales = getInitiales($userName);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<style>
    body { margin: 0; height: 100vh; overflow: hidden; }
    .app-shell { display: flex; height: 100vh; overflow: hidden; }
    .app-sidebar { position: fixed; top: 0; left: 0; bottom: 0; width: 260px; background: #111827; color: #fff; padding: 1rem; overflow-y: hidden; display: flex; flex-direction: column; }
    .app-main { margin-left: 260px; width: calc(100% - 260px); height: 100vh; display: flex; flex-direction: column; }
    .app-navbar { position: fixed; top: 0; left: 260px; right: 0; z-index: 999; background: #fff; border-bottom: 1px solid #dee2e6; padding: .75rem 1rem; }
    .app-content { margin-top: 62px; padding: 1rem; overflow-y: auto; height: calc(100vh - 62px); }
</style>
<div class="app-shell">
    <div class="app-sidebar">

        <!-- Logo -->
        <div class="d-flex align-items-center gap-2 mb-4 pb-3 border-bottom border-secondary">
            <div class="bg-primary rounded p-1 d-flex align-items-center justify-content-center" style="width:36px;height:36px">
                <span class="fw-bold small">GP</span>
            </div>
            <span class="fw-bold fs-5">GestinProj</span>
        </div>
        <br>
        <!-- Navigation -->
        <ul class="nav flex-column gap-1 flex-grow-1">
            <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>views/dashboard.php" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 bg-primary text-white">
                    <i class="bi bi-grid"></i>
                    Tableau de bord
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>views/projects/list.php" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-white-50">
                    <i class="bi bi-briefcase"></i>
                    Projets
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>tasks/list.php" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-white-50">
                    <i class="bi bi-check-square"></i>
                    Mes Tâches
                </a>
            </li>
            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
            <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>views/users/list.php" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-white-50">
                    <i class="bi bi-people"></i>
                    Utilisateurs
                </a>
            </li>
            <?php endif; ?>
        </ul>

        <!-- Déconnexion -->
        <div class="border-top border-secondary pt-3 mt-auto">
            <form action="<?php echo BASE_URL; ?>views/auth/logout.php" method="post">
                <input type="hidden" name="action" value="logout">
                <button type="submit" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-white-50 border-0 bg-transparent w-100">
                    <i class="bi bi-box-arrow-right"></i> Déconnexion
                </button>
            </form>
            
        </div>
    </div>

    <div class="app-main">
        <nav class="app-navbar d-flex justify-content-between align-items-center">
            <span class="navbar-brand fw-semibold"><?php echo $pageTitle ?? 'Tableau de bord'; ?></span>
            <div class="d-flex align-items-center gap-3">
                <div class="text-end">
                    <div class="fw-semibold small"><?php echo htmlspecialchars($userName); ?></div>
                    <div class="text-muted" style="font-size: 0.75rem"><?php echo htmlspecialchars($userRole); ?></div>
                </div>
                <div class="rounded-circle bg-primary bg-opacity-25 text-primary fw-bold d-flex align-items-center justify-content-center"
                    style="width:40px;height:40px;font-size:0.875rem">
                    <?php echo htmlspecialchars($initiales); ?>
                </div>
            </div>
        </nav>
        <!-- contenue -->
        <main class="app-content bg-primary bg-opacity-10">