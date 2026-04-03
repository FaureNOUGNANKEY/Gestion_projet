    <?php 
    $pageTitle = 'Liste des projets';
    include_once __DIR__ . '/../../includes/header.php';
    include_once __DIR__ . '/../../controller/ProjectController.php';
    
    // Récupération des projets via le Controller
    $projets = getList($db, $_SESSION['user_id']);
    
    // Couleurs avatar Bootstrap cycliques
    $couleurs = ['info', 'success', 'warning', 'danger', 'primary'];
?>

<div class="container-fluid " style="max-width: 1150px;">
    <div>
        <?php if (isset($_GET['msg'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_GET['msg']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
     </div>
    
     
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold mb-0">Mes Projets</h5>
        <button  class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#create">
            <a href="create.php" class="text-white text-decoration-none">+ Nouveau Projet</a>
        </button>
    </div>

  <div class="row g-4">

  <?php foreach ($projets as $index => $projet):

    $membres = $projet['membres'] ?? [];
    $membres_visibles = array_slice($membres, 0, 2);
    $membres_restants = max(0, count($membres) - 2);

    // Code du projet : P1, P2...
    $code = 'P' . ($index + 1);

    // Couleur du titre : bleu pour le 1er
   // $titre_class = $index === 0 ? 'text-primary' : 'text-dark';
  ?>

    <div class="col-12 col-md-6 col-lg-4">
      <div class="card border rounded-4 shadow-sm h-100">
        <div class="card-body d-flex flex-column gap-2">

          <!-- Badge code + menu -->
          <div class="d-flex justify-content-between align-items-start">
            <span class="badge bg-primary bg-opacity-10 text-primary fw-bold fs-6 px-3 py-2 rounded-3">
              <?= htmlspecialchars($code) ?>
            </span>
            <button class="btn btn-sm text-secondary border-0 fs-5 p-0 px-1">&#8942;</button>
          </div>

          <!-- Titre -->
          <h6 class="card-title fw-bold <?= $titre_class ?> mb-0">
            <a href="detail.php?id=<?= $projet['id'] ?>" class="text-decoration-none">
              <?= htmlspecialchars($projet['title']) ?>
            </a>
          </h6>

          <!-- Description -->
          <p class="card-text text-secondary small">
            <?= htmlspecialchars($projet['description'] ?? 'Aucune description.') ?>
          </p>

          <!-- Membres + rôle -->
          <div class="d-flex justify-content-between align-items-center mt-auto">
            <div class="d-flex">
              <?php foreach ($membres_visibles as $i => $membre):
                // Initiales depuis le nom
                $mots     = explode(' ', trim($membre['name']));
                $initiales = strtoupper(substr($mots[0], 0, 1) . (isset($mots[1]) ? substr($mots[1], 0, 1) : ''));
                $couleur  = $couleurs[$i % count($couleurs)];
              ?>
                <span class="badge rounded-circle bg-<?= $couleur ?> text-white me-1 p-2"
                      title="<?= htmlspecialchars($membre['name']) ?>">
                  <?= $initiales ?>
                </span>
              <?php endforeach; ?>

              <?php if ($membres_restants > 0): ?>
                <span class="badge rounded-circle bg-light text-secondary border p-2">
                  +<?= $membres_restants ?>
                </span>
              <?php endif; ?>
            </div>

            <span class="badge bg-light text-secondary border rounded-pill px-3 py-2">
              <?= htmlspecialchars($projet['role_affiche']) ?>
            </span>
          </div>

        </div>
      </div>
    </div>

  <?php endforeach; ?>

  <?php if (empty($projets)): ?>
    <div class="col-12">
      <p class="text-secondary text-center">Aucun projet trouvé.</p>
    </div>
  <?php endif; ?>

  </div>
</div>


<?php 
    include __DIR__ . '/../../includes/footer.php';
?>
