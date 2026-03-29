<?php 
    $pageTitle = "Modifier l'utilisateur";
    include_once __DIR__ . '/../../controller/UserController.php';
    include_once __DIR__ . '/../../includes/header.php';
    $data= getUserById($db, $_GET['id']);
?>

    <div class="card shadow-sm">
        <div class="card-body">
            <!-- <h5 class="card-title mb-4">Modifier l'utilisateur</h5> -->
            <form method="POST" action="#">
                <input type="text" name="action" value="update" hidden>
                <input type="hidden" name="id" value="<?php echo $data[0]['id']; ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $data[0]['name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $data[0]['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Rôle</label>
                    <select class="form-select" id="role" name="role">
                        <option value="admin" <?php echo ($data[0]['role'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="user" <?php echo ($data[0]['role'] === 'user') ? 'selected' : ''; ?>>User</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Enregistrer les modifications</button>
                <a href="list.php" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>

    <?php include_once __DIR__ . '/../../includes/footer.php'; ?>