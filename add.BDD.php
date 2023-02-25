<?php
include_once('nav.php');
?>
<?php
session_start();

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: admin.php"); // rediriger vers la page de connexion
    exit(); // arrêter l'exécution du script
}
?>

<br><br><br><br>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Ajouter au Portfolio</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="add-traitement.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="titre">Titre de l'item : </label>
                            <input type="text" class="form-control" name="titre" required>
                        </div> <br>
                        <div class="form-group">
                            <label for="image">Ajouter une image : </label> <br> <br>
                            <input type="file" id="image" name="image" required>
                        </div> <br>
                        <div class="form-group">
                            <label for="description">Ajouter une description : </label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-block">Ajouter à la BDD</button>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>