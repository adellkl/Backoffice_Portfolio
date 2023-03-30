<?php
include_once('PDOconfig.php');
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


<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">

        <h2 class="page-section-heading text-center text-uppercase text-white">
            About

        </h2>

        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div> <br>

        <div class="row">
            <div class="ms-auto">
                <?php
                $query = $connexion->query("SELECT * FROM about");
                $row = $query->fetch();
                ?>
                <p class="lead">
                    <?php echo $row['description']; ?>
                </p>
                <center>
                    <?php

                    if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                        ?>
                        <a target="_blank" href="modifier_about.php"><i class="fas fa-edit ms-3 text-white"></i></a>
                        <?php
                    }
                    ?>
                </center>
            </div>


        </div>

        <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-light" download="assets/img/CV_Loukal_Adel.pdf" target="_blank"
                href="http://aloukal.alwaysdata.net/wp-content/uploads/2023/01/CV-2022-2023.pdf">
                <i class="fas fa-download me-2"></i>
                Téléchargez mon CV
            </a>
        </div>
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>