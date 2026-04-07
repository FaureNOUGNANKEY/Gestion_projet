<?php
$pageTitle = 'Détail du projet';
include_once __DIR__ . '/../../includes/header.php';
include_once __DIR__ . '/../../includes/auth_check.php';
include_once __DIR__ . '/../../controller/ProjectController.php';

$projets = getList($db, $_SESSION['user_id']);
?>
<div class="container py-4">

 <?php foreach ($projets as $index => $projet):

    $taches = $projet['taches'] ?? [];
    //$membres_visibles = array_slice($membres, 0, 2);
    //$membres_restants = max(0, count($membres) - 2);

    // Code du projet : P1, P2...
    $code = 'P' . ($index + 1);
  ?>
  <!-- Header Projet -->
  <div class="d-flex align-items-center gap-3 mb-3">
    <div class="bg-primary text-white fw-bold d-flex align-items-center justify-content-center rounded-3"
         style="width:60px; height:60px; font-size:20px;">
      <?= htmlspecialchars($code) ?>
    </div>
    <div>
      <h4 class="fw-bold mb-1"><?= htmlspecialchars($projet['title'] ?? '') ?></h4>
      <p class="text-muted mb-0">
        Propriétaire : <span class="fw-semibold">Admin Principal</span> • 
        Créé le : <span class="fw-semibold"><?= date('d M Y', strtotime($projet['created_at'] ?? '')) ?></span>
      </p>
    </div>
  </div>

  <!-- Layout principal : Kanban + Sidebar -->
  <div class="row g-4">

    <!-- Colonne principale (kanban) -->
    <div class="col-lg-9">

      <!-- Bloc Gestion des tâches -->
      <div class="card border-1 shadow-sm rounded-4 mb-3">
        <div class="card-body d-flex justify-content-between align-items-center">
          <h6 class="mb-0 fw-bold">Gestion des tâches</h6>
          <button class="btn btn-primary d-flex align-items-center gap-2 px-3 py-1">
            <span style="font-size:14px;">+</span> Ajouter
          </button>
        </div>
      </div>

      <!-- Kanban -->
      <div class="row g-3">

        <!-- À FAIRE -->
        <div class="col-md-4">
          <div class="d-flex align-items-center gap-2 mb-3">
            <span class="fw-bold text-uppercase text-secondary small">À Faire</span>
            <span class="badge rounded-pill bg-secondary-subtle text-secondary">2</span>
          </div>
          <div class="card border-0 shadow-sm rounded-3 mb-3">
            <div class="card-body">
              <h6 class="card-title fw-semibold">Mise en place de l'auth</h6>
              <p class="card-text text-secondary small">Utiliser password_hash pour les MDP.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge rounded-circle bg-warning text-white p-2">UA</span>
                <small class="text-secondary">#T-102</small>
              </div>
            </div>
          </div>
          <div class="card border-0 shadow-sm rounded-3 mb-3">
            <div class="card-body">
              <h6 class="card-title fw-semibold">Configurer les rôles</h6>
              <p class="card-text text-secondary small">Définir admin, éditeur et lecteur.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge rounded-circle bg-primary-subtle text-primary p-2">JD</span>
                <small class="text-secondary">#T-103</small>
              </div>
            </div>
          </div>
        </div>

        <!-- EN COURS -->
        <div class="col-md-4">
          <div class="d-flex align-items-center gap-2 mb-3">
            <span class="fw-bold text-uppercase text-secondary small">En Cours</span>
            <span class="badge rounded-pill bg-secondary-subtle text-secondary">2</span>
          </div>
          <div class="card border-0 shadow-sm rounded-3 mb-3">
            <div class="card-body">
              <h6 class="card-title fw-semibold">Mise en place de l'auth</h6>
              <p class="card-text text-secondary small">Utiliser password_hash pour les MDP.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge rounded-circle bg-warning text-white p-2">UA</span>
                <small class="text-secondary">#T-102</small>
              </div>
            </div>
          </div>
          <div class="card border-0 shadow-sm rounded-3 mb-3 border-start border-primary border-3">
            <div class="card-body">
              <h6 class="card-title fw-semibold">Correction CSS Responsive</h6>
              <p class="card-text text-secondary small">Fixer les marges sur mobile.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge rounded-circle bg-primary-subtle text-primary p-2">JD</span>
                <small class="text-secondary">#T-105</small>
              </div>
            </div>
          </div>
        </div>

        <!-- TERMINÉES -->
        <div class="col-md-4">
          <div class="d-flex align-items-center gap-2 mb-3">
            <span class="fw-bold text-uppercase text-secondary small">Terminées</span>
            <span class="badge rounded-pill bg-secondary-subtle text-secondary">2</span>
          </div>
          <div class="card border-0 shadow-sm rounded-3 mb-3">
            <div class="card-body">
              <h6 class="card-title fw-semibold">Mise en place de l'auth</h6>
              <p class="card-text text-secondary small">Utiliser password_hash pour les MDP.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge rounded-circle bg-warning text-white p-2">UA</span>
                <small class="text-secondary">#T-102</small>
              </div>
            </div>
          </div>
          <div class="card border-0 shadow-sm rounded-3 mb-3">
            <div class="card-body">
              <h6 class="card-title fw-semibold">Intégration API REST</h6>
              <p class="card-text text-secondary small">Connecter le back-end au front via Axios.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge rounded-circle bg-warning text-white p-2">UA</span>
                <small class="text-secondary">#T-101</small>
              </div>
            </div>
          </div>
        </div>

      </div><!-- fin kanban row -->
    </div><!-- fin col-lg-9 -->

    <!-- Sidebar droite -->
    <div class="col-lg-3">

      <!-- Actions -->
      <div class="card border-0 shadow-sm rounded-3 mb-4">
        <div class="card-body">
          <h6 class="fw-medium-bold mb-3">Actions</h6>
          <ul class="list-unstyled mb-3">
            <li class="mb-3">
              <a href="#" class="text-decoration-none text-muted d-flex align-items-center gap-2">
                <p>      </p>
                <i class="bi bi-pencil-square"></i> Modifier projet
              </a>
            </li>
            <li class="mb-3">
              <a href="#" class="text-decoration-none text-muted d-flex align-items-center gap-2">
                <p>      </p>
                <i class="bi bi-gear"></i> Gérer membres
              </a>
            </li>
            <li>
              <a href="#" class="text-decoration-none text-danger d-flex align-items-center gap-2">
                <p>      </p>
                <i class="bi bi-trash"></i> Supprimer projet
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Membres -->
      <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body">
          <h6 class="fw-bold mb-3">Membres (5)</h6>
          <ul class="list-unstyled mb-0">

            <li class="d-flex align-items-center justify-content-between mb-2">
              <div class="d-flex align-items-center gap-2">
                <span class="badge rounded-circle bg-primary-subtle text-primary p-2">JD</span>
                <span class="small">Jean Dupont</span>
              </div>
              <span class="badge bg-secondary-subtle text-secondary small">ADMIN</span>
            </li>

            <li class="d-flex align-items-center justify-content-between mb-2">
              <div class="d-flex align-items-center gap-2">
                <span class="badge rounded-circle bg-success-subtle text-success p-2">MC</span>
                <span class="small">Marie Curie</span>
              </div>
              <span class="badge bg-secondary-subtle text-secondary small">MEMBRE</span>
            </li>

            <li class="d-flex align-items-center justify-content-between mb-2">
              <div class="d-flex align-items-center gap-2">
                <span class="badge rounded-circle bg-warning-subtle text-warning p-2">PM</span>
                <span class="small">Paul Martin</span>
              </div>
              <span class="badge bg-secondary-subtle text-secondary small">MEMBRE</span>
            </li>

            <li class="d-flex align-items-center justify-content-between mb-2">
              <div class="d-flex align-items-center gap-2">
                <span class="badge rounded-circle bg-danger-subtle text-danger p-2">AL</span>
                <span class="small">Alice Leblanc</span>
              </div>
              <span class="badge bg-secondary-subtle text-secondary small">MEMBRE</span>
            </li>

            <li class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center gap-2">
                <span class="badge rounded-circle bg-info-subtle text-info p-2">TR</span>
                <span class="small">Thomas Renard</span>
              </div>
              <span class="badge bg-secondary-subtle text-secondary small">MEMBRE</span>
            </li>

          </ul>
        </div>
      </div>

    </div><!-- fin sidebar -->
  </div><!-- fin row principale -->
</div>

<?php endforeach; ?>  

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>