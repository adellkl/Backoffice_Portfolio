<?php
include_once('nav.php');
?>
<br><br><br><br><br><br><br>

<head>
    <link rel="stylesheet" href="css/contact.css">
</head>
<div class="background">
    <div class="container-form">
        <div class="screen">
            <div class="screen-header">
                <div class="screen-header-left">
                    <div class="screen-header-button close"></div>
                    <div class="screen-header-button maximize"></div>
                    <div class="screen-header-button minimize"></div>
                </div>
                <div class="screen-header-right">
                    <div class="screen-header-ellipsis"></div>
                    <div class="screen-header-ellipsis"></div>
                    <div class="screen-header-ellipsis"></div>
                </div>
            </div>

            <div class="screen-body">
                <div class="screen-body-item left">
                    <br><br>

                    <div class="app-map ">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2618.879298840614!2d2.3745885157538718!3d48.974822000455475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6697fd2eeccfb%3A0x2f4803cf34fe74a9!2sIUT%20de%20Cergy-Pontoise%20-%20site%20de%20Sarcelles!5e0!3m2!1sfr!2sfr!4v1679997936334!5m2!1sfr!2sfr"
                            width="660" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="app-contact">CONTACT INFO : 0769137890</div>

                </div>
                <div class="screen-body-item">
                    <div class="app-form">
                        <div class="app-title">
                            <span>CONTACTEZ MOI</span>
                            <span></span>

                        </div> <br>


                        <form method="post" action="contact-traitement.php">
                            <div class="app-form-group">
                                <input class="app-form-control" name="nom" placeholder="NOM" required>
                            </div>
                            <div class="app-form-group">
                                <input class="app-form-control" name="email" placeholder="EMAIL" required>
                            </div>
                            <div class="app-form-group">
                                <input class="app-form-control" name="sujet" placeholder="OBJET" required>
                            </div>
                            <div class="app-form-group message">
                                <input class="app-form-control" name="mess" placeholder="MESSAGE" required>
                            </div>
                            <div class="app-form-group buttons">
                                <button type="reset" class="app-form-button">ANNULER</button>
                                <button type="submit" class="app-form-button">ENVOYER</button>
                            </div>
                        </form>
                    </div> <br>
                    <?php
                    // envoyer le message de confirmation de l'envoi des donnee ou alors de l'erreur
                    if (isset($_GET['message'])) {
                        $message = $_GET['message'];
                        if ($message === "Erreur") {
                            echo "<div class='alert alert-danger' role='alert'>$message</div>";
                        } else {
                            echo "<div class='alert alert-success' role='alert'>$message</div>";
                        }
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Content -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>