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
include_once('nav.php');
?> <br><br>
<?php
include_once('presentation.php');
?>






<section class="page-section portfolio" id="videos-section">
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
                <div class="d-flex justify-content-center mb-2" role="group" aria-label="Filtrer les éléments">
                    <a href="index.php#images-section"><button type="button" class="btn btn-secondary btn-filter active"
                            data-filter="all">Projet developpement web</button></a>
                    <span style="width:10px;"></span>
                    <a href="section—video.php#videos-section"><button type="button"
                            class="btn btn-secondary btn-filter" data-filter="video">Projets vidéos</button></a>
                </div>
            </div>
        </center> <br>

        <div class="row">
            <div class="col-md-6">
                <div class="video-container">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/SVl6baso9_c" frameborder="0"
                        allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-md-6">
                <div class="video-container">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/MUhFXv1kPsE" frameborder="0"
                        allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>

            </div>

        </div>

    </div>
</section>



</section>
<?php
include_once('about.php');
?>

<?php
include_once('Footer.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>