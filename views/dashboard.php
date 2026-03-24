<?php 
include __DIR__ . '/../controller/AuthController.php';
include __DIR__ . '/../includes/auth_check.php';
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

$userName = $_SESSION['user_name'] ;//?? 'Jean Dupont';
$userRole = $_SESSION['user_role'] ;//?? 'Administrateur';
$initiales = getInitiales($userName);
?>

<?php
$pageTitle = 'Tableau de bord';
include __DIR__ . '/../includes/header.php';
?>
    <!-- Contenu spécifique au dashboard -->
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card p-3">
                <div class="text-muted small">Projets actifs</div>
                <div class="fw-bold fs-3 text-dark">12</div>
            </div>
        </div>
    </div>

<?php include __DIR__ . '/../includes/footer.php'; ?>