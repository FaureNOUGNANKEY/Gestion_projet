<?php
$pageTitle = 'Détail du projet';
include_once __DIR__ . '/../../includes/header.php';
?>
<div class="container py-4">

  <!-- Header Projet -->
  <div class="d-flex align-items-center gap-3 mb-4">
    
    <!-- Badge P1 -->
    <div class="bg-primary text-white fw-bold d-flex align-items-center justify-content-center"
         style="width:60px; height:60px; border-radius:15px; font-size:20px;">
      P1
    </div>

    <!-- Infos projet -->
    <div>
      <h4 class="fw-bold mb-1">Refonte Site Web Corporate</h4>
      <p class="text-muted mb-0">
        Propriétaire : <span class="fw-semibold">Admin Principal</span> • 
        Créé le 12/03/2024
      </p>
    </div>

  </div>

  <!-- Bloc Gestion des tâches -->
  <div class="card border-1 shadow-sm rounded-4">
    <div class="card-body d-flex justify-content-between align-items-center">

      <h5 class="mb-0 fw-semibold text-bold">Gestion des tâches</h5>
    

      <button class="btn btn-primary d-flex align-items-center gap-2 px-3">
        <span style="font-size:18px;">+</span>
        Ajouter
      </button>

    </div>
  </div>

</div>


<div class="container py-4">
    <div class="badge btn btn-primary text-white fw-bold fs-6 px-4 py-4 rounded-4 mb-3" style="background-color: #007BFF;">
        P1
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <p class="card-text text-bold">Gestion des taches</p>
                <a href="#" class="btn btn-primary">+ Ajouter</a>
            </div>  
        </div>
    </div>
    <h1 class="h4">Détail projet (temporaire)</h1>
    <p>Ce contenu est vide pour l'instant. Ajoutez ici l'affichage du détail du projet.</p>
</div>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
