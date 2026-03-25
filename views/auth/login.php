<?php 
session_start();
include __DIR__ . '/../../controller/AuthController.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Connexion</title>
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
        <h3 class="text-center">Connexion</h3>
        <?php if(isset($_GET['msg'])){ ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['msg']; ?>
            </div>
        <?php } ?>

        <form action="#" method="post">
            <input type="text" name="action" value="login" hidden>
            <div class="mb-3">
                <label for="email">email :</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div>
                <button type="submit" class="btn btn-primary w-100">Se connecté</button>
            </div>

        </form>
    </div>
    
</body>
</html>