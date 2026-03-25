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
        <div class="col-md-4">
            <div class="card p-3">
                <div class="text-muted small">Taches en cours </div>
                <div class="fw-bold fs-3 text-primary">55</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 ">
                <div class="text-muted small">Taches terminés</div>
                <div class="fw-bold fs-3 text-success">4</div>
            </div>
        </div>
    </div>
        
    </div>

<?php include __DIR__ . '/../includes/footer.php'; ?>