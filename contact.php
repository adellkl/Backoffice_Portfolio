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
                    <div class="app-title">
                        <span>CONTACTEZ MOI</span>
                        <span></span>
                    </div>
                    <div class="app-contact">CONTACT INFO : 0769137890</div>
                </div>
                <div class="screen-body-item">
                    <div class="app-form">
                        <form method="post" action="contact-traitement.php">
                            <div class="app-form-group">
                                <input class="app-form-control" name="name" placeholder="NOM">
                            </div>
                            <div class="app-form-group">
                                <input class="app-form-control" name="email" placeholder="EMAIL">
                            </div>
                            <div class="app-form-group">
                                <input class="app-form-control" name="subject" placeholder="OBJET">
                            </div>
                            <div class="app-form-group message">
                                <input class="app-form-control" name="message" placeholder="MESSAGE">
                            </div>
                            <div class="app-form-group buttons">
                                <button type="reset" class="app-form-button">ANNULER</button>
                                <button type="submit" class="app-form-button">ENVOYER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Content -->
<?php
include_once('footer.php');
?>