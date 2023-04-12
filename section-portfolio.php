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



<?php
$host = 'localhost';
$dbname = 'nom_etudiant_portfolio';
$username = 'root';
$password = 'root';

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) { // gerer les erreurs dans la requete
    echo "Erreur : " . $e->getMessage();
}

$req = $bdd->query("SELECT * FROM portfolio");

// fetchAll : récupérer toutes les lignes retournées par la requête
//  Le paramètre PDO::FETCH_ASSOC spécifie que chaque ligne sera renvoyée sous forme d'un tableau associatif 
$donnees = $req->fetchAll(PDO::FETCH_ASSOC);
?>




<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Portfolio</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>



        <center>
            <div class="container">
                <div class="justify-content-center mb-2" role="group" aria-label="Filtrer les éléments">
                    <button type="button" class="btn btn-secondary btn-filter active" data-filter="all">All</button>
                    <button type="button" class="btn btn-secondary btn-filter" data-filter="back-end">Backend
                        development</button>
                    <button type="button" class="btn btn-secondary btn-filter" data-filter="front-end">Frontend
                        development</button>
                    <button type="button" class="btn btn-secondary btn-filter" data-filter="design">Design</button>
                </div>
            </div>
        </center> <br>
        <div class="row justify-content-center portfolio-items">
            <?php foreach ($donnees as $donnee): ?>
                <div class="col-md-6 col-lg-4 mb-5 portfolio-item" data-filter="<?= $donnee['categorie'] ?>">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal"
                        data-bs-target="#portfolioModal<?= $donnee['id'] ?>" id="portfolio<?= $donnee['id'] ?>">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid rounded" src="assets/img/portfolio/<?= $donnee['image'] ?>"
                            alt="<?= $donnee['titre'] ?>" style="object-fit: cover; width: 100%; height: 300px;">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>








    <!-- Portfolio Modal -->
    <?php foreach ($donnees as $donnee): ?>
        <div class="portfolio-modal modal fade" id="portfolioModal<?= $donnee['id'] ?>" tabindex="-1"
            aria-labelledby="portfolioModal<?= $donnee['id'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center pb-6">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">
                                        <?= $donnee['titre'] ?>
                                    </h2><br>
                                    <h3 class=" mb-0 ">
                                        Catégorie :
                                        <?= $donnee['categorie'] ?>
                                    </h3>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/<?= $donnee['image'] ?>"
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>


    $(document).ready(function () {
        $(".btn-filter").click(function () {
            var value = $(this).attr('data-filter');
            if (value == "all") {
                $('.portfolio-item').show('1000');
            } else {
                $(".portfolio-item").not('.' + value).hide('3000');
                $('.portfolio-item').filter('.' + value).show('3000');
            }
        });
        if ($(".btn-filter").removeClass("active")) {
            $(this).removeClass("active");
        }
        $(this).addClass("active");
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>