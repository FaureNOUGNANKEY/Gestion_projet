<?php
$pageTitle = 'Tableau de bord';
include_once __DIR__ . '/../includes/header.php';
?>
    <!-- Contenu spécifique au dashboard -->
    <div class="row g-3 mx-auto" style="max-width: 1150px;">
        <div class="col-md-4">
            <div class="card p-3 rounded-4 ">
                <div class="text-muted small">Projets actifs</div>
                <div class="fw-bold fs-3 text-dark">12</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 rounded-4 ">
                <div class="text-muted small">Taches en cours </div>
                <div class="fw-bold fs-3 text-primary">55</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 rounded-4 ">
                <div class="text-muted small">Taches terminés</div>
                <div class="fw-bold fs-3 text-success">4</div>
            </div>
        </div>
    </div>
    <br> 

    <div class="row g-4 mx-auto" style="max-width: 1150px;"> 

        <div class="col-md-6">
            <div class="card p-3 rounded-3">
                <div class="d-flex justify-content-between mb-3">
                    <h6>Projets récents</h6>
                    <a href="#" class="text-primary small text-decoration-none">Voir tout</a>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <div class="badge rounded-2 bg-primary px-2 py-2">P1</div>
                            <div>
                                <div>Projet Développement Web 1</div>
                                <small class="text-muted">Mis à jour il y a 2h</small>
                            </div>
                        </div>
                        <span>›</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <div class="badge rounded-2 bg-primary px-2 py-2">P1</div>
                            <div>
                                <div>Projet Développement Web 1</div>
                                <small class="text-muted">Mis à jour il y a 2h</small>
                            </div>
                        </div>
                        <span>›</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <div class="badge rounded-2 bg-primary px-2 py-2">P1</div>
                            <div>
                                <div>Projet Développement Web 1</div>
                                <small class="text-muted">Mis à jour il y a 2h</small>
                            </div>
                        </div>
                        <span>›</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-3 rounded-3 ">
                <div class=" card-title text-muted border-bottom">Dernières tâches assignées</div>
                <div class="fw-bold fs-3 text-dark">5</div>
            </div>
        </div>
    </div>

<?php include __DIR__ . '/../includes/footer.php'; ?>