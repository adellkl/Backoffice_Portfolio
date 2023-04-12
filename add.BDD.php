<?php
// inclusion de la barre de navigation
include_once('nav.php');
?>

<?php
// vérifier si l'utilisateur est connecté, sinon le rediriger vers la page de connexion
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: admin.php");
    exit();
}
?>
<!-- ajout de plusieurs sauts de ligne -->
<br><br><br><br>

<body>


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
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="categorie">catégorie : </label>
                                <input type="text" class="form-control" name="categorie" required>
                            </div>
                            <br>


                            <div class="form-group">
                                <label for="image">Ajouter une image : </label> <br> <br>
                                <input type="file" id="image" name="image" required>
                            </div>
                            <br>


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>