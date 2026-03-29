<?php 
    $pageTitle = "Administration";
    include_once __DIR__ . '/../../controller/UserController.php';
    include_once __DIR__ . '/../../includes/header.php';
    $data= listUsers($db);
?>

<div class="container mt-4">

    <!-- En-tête -->
     <div>
        <?php if (isset($_GET['msg'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_GET['msg']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
     </div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0 text-primary">Gestion des utilisateurs</h4>
            <small class="text-muted">Gérez les accès globaux de votre application.</small>
        </div>
        <div class="d-flex gap-2 align-items-center">
            <input type="text" id="searchInput" class="form-control" 
                   placeholder="Rechercher..." style="width: 260px;">
            <!-- <a href="create.php" class="btn btn-primary">
                <i class="bi bi-person-plus-fill me-1"></i> Ajouter un utilisateur
            </a> -->
        </div>
    </div>

    <!-- Tableau -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover table-bordered align-middle mb-0" id="usersTable">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom et prénoms</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data)) : ?>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><span class="badge bg-secondary"><?= $row['id'] ?></span></td>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td>
                                    <i class="bi bi-envelope me-1 text-muted"></i>
                                    <?= htmlspecialchars($row['email']) ?>
                                </td>
                                <td>
                                    <?php if ($row['role'] === 'admin') : ?>
                                        <span class="badge bg-danger">Admin</span>
                                    <?php else : ?>
                                        <span class="badge bg-success">Utilisateur</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <i class="bi bi-calendar me-1 text-muted"></i>
                                    <?= $row['created_at'] ?>
                                </td>
                                <td class="text-center">
                                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning me-1">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <form method="POST" action="" style="display: inline;">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Recherche en temps réel -->
<script>
    document.getElementById('searchInput').addEventListener('keyup', function () {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#usersTable tbody tr'); 
        rows.forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(filter) ? '' : 'none';
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>