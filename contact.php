<?php
include_once('nav.php');
?>


<br><br><br><br><br><br><br>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h1>Contactez-moi 😁 :</h1> <br>
            <!-- Formulaire a terminer : faire le traitement des messages -->
            <form name="sentMessage" id="contactForm" novalidate>
                <div class="control-group">
                    <div class="form-floating controls mb-3">
                        <input type="text" class="form-control l" placeholder="Nom" id="name" required
                            data-validation-required-message="Veuillez entrer votre nom." />
                        <label for="name">Nom</label>
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-floating controls mb-3">
                        <input type="email" class="form-control l" placeholder="Adresse e-mail" id="email" required
                            data-validation-required-message="Veuillez entrer votre adresse e-mail." />
                        <label for="email">Adresse e-mail</label>
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-floating controls mb-3">
                        <textarea rows="5" class="form-control l" placeholder="Message" id="message" required
                            data-validation-required-message="Veuillez entrer votre message."></textarea>
                        <label for="message">Message</label>
                        <p class="help-block"></p>
                    </div>
                </div>
                <div id="success"></div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-md-2">
            <img src="assets/img/avataaars.svg" class="img-fluid" alt="Avatar de mon site ">
        </div>
    </div>
</div> <br> <br><br>