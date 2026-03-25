<?php 
    $pageTitle = 'Liste des projets';
    include __DIR__ . '/../../includes/header.php';
?>

    <!-- contenue de spécifique de projectlist -->
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card p-3 ">
                <div class="text-muted small">Nombre de projets</div>
                <div class="fw-bold fs-3 text-dark">12</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 ">
                <div class="text-muted small">Projets en cours</div>
                <div class="fw-bold fs-3 text-dark">8</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 ">
                <div class="text-muted small">Projets terminés</div>
                <div class="fw-bold fs-3 text-dark">4</div>
            </div>
        </div>
    </div>

<?php 
    include __DIR__ . '/../../includes/footer.php';
?>
