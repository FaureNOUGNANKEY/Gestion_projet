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
<div class="d-flex vh-100">
    <div class="d-flex flex-column bg-dark text-white vh-100 p-3" style="width: 260px;">

        <!-- Logo -->
        <div class="d-flex align-items-center gap-2 mb-4 pb-3 border-bottom border-secondary">
            <div class="bg-primary rounded p-1 d-flex align-items-center justify-content-center" style="width:36px;height:36px">
                <span class="fw-bold small">GP</span>
            </div>
            <span class="fw-bold fs-5">GestinProj</span>
        </div>

        <!-- Navigation -->
        <ul class="nav flex-column gap-1 flex-grow-1">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 bg-primary text-white">
                    <i class="bi bi-grid"></i>
                    Tableau de bord
                </a>
            </li>
            <li class="nav-item">
                <a href="projects/list.php" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-white-50">
                    <i class="bi bi-briefcase"></i>
                    Projets
                </a>
            </li>
            <li class="nav-item">
                <a href="tasks/list.php" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-white-50">
                    <i class="bi bi-check-square"></i>
                    Mes Tâches
                </a>
            </li>
            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
            <li class="nav-item">
                <a href="users/list.php" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-white-50" name="action" value="logout">
                    <i class="bi bi-people"></i>
                    Utilisateurs
                </a>
            </li>
            <?php endif; ?>
        </ul>

        <!-- Déconnexion -->
        <div class="border-top border-secondary pt-3">
            <form action="auth/logout.php" method="post">
                <input type="hidden" name="action" value="logout">
                <button type="submit" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-white-50 border-0 bg-transparent w-100">
                    <i class="bi bi-box-arrow-right"></i> Déconnexion
                </button>
            </form>
            
        </div>
    </div>

    <div class="d-flex flex-column flex-grow-1"> 
        <nav class="navbar bg-white border-bottom px-4">
            <span class="navbar-brand fw-semibold">Tableau de bord</span>

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
        <main class="p-4">