<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>ajouter un projet</title>
</head>
<style>
    #container {
    width: 100%;
    max-width: 850px;
    margin: 0 auto;
    padding: 20px;
    background-color: #1378a070;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
}
</style>
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-white">
    <div class="w-100" style="max-width: 400px;" id="container">
        <h3 class="text-center">Créer un projet</h3>
        <?php if (!empty($msg)): ?>
            <div class="alert alert-danger"><?php echo $msg; ?></div>
        <?php endif; ?>
        <form action="#" method="post">
            <input type="text" name="action" value="create" hidden>
            <div class="mb-3">
                <label for="title">Titre :</label> 
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" ></textarea>
            </div>
            <br>
            <input type="text" name="owner_id" value=" <?php $_SESSION['user_id']; ?>" hidden>
            <div class="d-flex gap-2">
                <button class="btn btn-primary w-50 ">Créer</button>
                <button class="btn btn-primary w-50" > <a href="" class="text-white text-decoration-none">Annuler</a> </button>
            </div>
        </form>
    </div>
    
</body>
</html>