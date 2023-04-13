<?php
session_start();

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: admin.php");
    exit();
}
?>
<?php
// inclure le fichier de navigation
include_once('nav.php');

// définir les paramètres de la base de données
$host = 'localhost';
$dbname = 'nom_etudiant_portfolio';
$username = 'root';
$password = 'root';

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // configurer le mode d'erreur en cas de problème
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $req = $bdd->prepare("SELECT titre, image, description, categorie FROM portfolio WHERE id = :id");
    $req->bindParam(':id', $id);

    $req->execute();

    $resultat = $req->fetch(PDO::FETCH_ASSOC);

    $titre = $resultat['titre'];
    $image = $resultat['image'];
    $description = $resultat['description'];
    $categorie = $resultat['categorie'];
}
?>


<br><br><br><br>


<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <a href="modif-portfolio.php" class="btn btn-dark" onclick="return confirmerRetour();">Retour</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Modifier l'item :<p class="p-item">
                            <?php echo $titre; ?>
                        </p>
                    </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="Item-modif.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label for="titre">Titre de l'item : </label>
                            <input type="text" class="form-control champ-modifie" name="titre"
                                value="<?php echo $titre; ?>" required>
                        </div> <br>
                        <div class="form-group">
                            <label for="categorie">Catégorie de l'item :</label>
                            <div class="select-wrapper">
                                <select class="form-control" name="categorie" required>

                                    <?php
                                    $cat = $bdd->query("SELECT categories FROM categorie");
                                    foreach ($cat as $c) {
                                        $selected = '';
                                        if ($categorie === $c['categories']) {
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option value="<?= $c['categories'] ?>" <?= $selected ?>><?= $c['categories'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="select-arrow"></div>
                            </div>

                        </div>

                        <br>
                        <div class="form-group">
                            <label for="image">Modifier l'image : </label>

                            <input type="file" id="image" name="image"> <br><br>
                            <p>Ancienne photo: </p>
                            <img src="assets/img/portfolio/<?php echo $image; ?>" alt="<?php echo $titre; ?>"
                                style="max-width: 30%; height: auto;">
                        </div> <br>

                        <div class="form-group">
                            <label for="description">Modifier la description : </label>
                            <textarea class="form-control champ-modifie" id="description" name="description"
                                rows="3"><?php echo $description; ?></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-block"
                            onclick="return confirmerModification();">Modifier l'item</button> <br><br>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function confirmerModification() {
        if (confirm("Voulez-vous vraiment modifier l'item ?")) {

            return true;
        } else {

            return false;
        }
    }
    function confirmerRetour() {
        if (confirm("Retour sans modification ? ")) {

            return true;
        } else {

            return false;
        }
    }

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>