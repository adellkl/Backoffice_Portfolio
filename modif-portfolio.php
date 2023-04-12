<!-- #Connexion a la BD -->
<?php
include_once('nav.php');
?> <br><br>
<?php

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: admin.php");
    exit();
}
?>

<?php
$host = 'localhost'; // adresse du serveur de la base de données
$dbname = 'nom_etudiant_portfolio'; // nom de la base de données
$username = 'root'; // nom d'utilisateur de la base de données
$password = 'root'; // mot de passe de la base de données

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); // instanciation d'un objet PDO pour se connecter à la base de données
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // configuration pour générer des exceptions en cas d'erreur
} catch (PDOException $e) { // capture d'une exception de type PDOException
    echo "Erreur : " . $e->getMessage(); // affichage de l'erreur
}

$req = $bdd->query("SELECT * FROM portfolio"); // exécution d'une requête de sélection de toutes les entrées de la table portfolio
$donnees = $req->fetchAll(PDO::FETCH_ASSOC); // récupération de toutes les données sous forme de tableau associatif
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Portfolio Adel Loukal</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>




<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edit Portfolio</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($donnees as $donnee): ?>
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal"
                        data-bs-target="#portfolioModal<?= $donnee['id'] ?>">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/portfolio/<?= $donnee['image'] ?>"
                            alt="<?= $donnee['titre'] ?>" />
                    </div>
                    <div class="text-center mt-3">
                        <a href="Item-supp.php?id=<?= $donnee['id'] ?>" class="btn btn-danger"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce travail ?')">Supprimer</a>


                        <a href="form_item.php?id=<?= $donnee['id'] ?>" class="btn btn-primary">Modifier</a>
                    </div>

                </div>

                <!-- Portfolio Modal -->
                <div class="portfolio-modal modal fade" id="portfolioModal<?= $donnee['id'] ?>" tabindex="-1"
                    aria-labelledby="portfolioModal<?= $donnee['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center pb-5">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <!-- Portfolio Modal - Title-->
                                            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">
                                                <?= $donnee['titre'] ?>
                                            </h2>
                                            <!-- Icon Divider-->
                                            <div class="divider-custom">
                                                <div class="divider-custom-line"></div>
                                                <div class="divider-custom-icon">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="divider-custom-line"></div>
                                            </div>
                                            <!-- Portfolio Modal - Image-->
                                            <img class="img-fluid rounded mb-5"
                                                src="assets/img/portfolio/<?= $donnee['image'] ?>"
                                                alt="<?= $donnee['titre'] ?>" />
                                            <!-- Portfolio Modal - Text-->
                                            <p class="mb-4">
                                                <?= $donnee['description'] ?>
                                            </p>
                                            <button class="btn btn-primary" data-bs-dismiss="modal">
                                                <i class="fas fa-xmark fa-fw"></i>
                                                Fermer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->