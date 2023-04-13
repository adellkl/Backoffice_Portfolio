<?php
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: admin.php");
    exit();
}
?>

<?php
include_once('nav.php');
?> <br><br>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages reçus</title>
    <!-- Inclure le CSS de Bootstrap pour les cartes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body> <br><br>
    <div class="container mt-4">
        <h1>Messages reçus</h1>
        <?php
        // Se connecter à la base de données
        $host = 'localhost';
        $dbname = 'nom_etudiant_portfolio';
        $username = 'root';
        $password = 'root';

        try {
            $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $connexion) {
            echo "Erreur de connexion à la base de données : " . $mess->getMessage();
            exit();
        }

        // Compter le nombre de messages reçus
        $sql_count = "SELECT COUNT(*) AS total FROM contact";
        $resultat_count = $connexion->query($sql_count);
        $row_count = $resultat_count->fetch(PDO::FETCH_ASSOC);
        $count_messages = $row_count['total'];

        // Afficher le nombre de messages reçus
        echo '<p>Nombre de messages reçus : <span>' . $count_messages . '</span></p>';

        // Sélectionner tous les messages de la table "contact"
        $sql = "SELECT * FROM contact";
        $resultat = $connexion->query($sql);

        if ($count_messages > 0) {
            echo '<div id="cards-container">';
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="card mt-4">';
                echo '<div class="card-header"> Sujet: ' . $row['sujet'] . '</div>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['nom'] . '</h5>';
                echo '<p class="card-text">' . $row['mess'] . '</p>';
                echo '<p class="card-text"><small class="text-muted">' . $row['email'] . '</small></p>';
                echo '<a href="mailto:' . $row['email'] . '" target="_blank" class="btn btn-primary">Répondre</a> ';
                echo '<button id="supprimer-' . $row['id'] . '" class="btn btn-danger">Supprimer</button>';


                echo '<script>
            var btnSupprimer = document.getElementById("supprimer-' . $row['id'] . '");

            btnSupprimer.addEventListener("click", function() {
                if (confirm("Voulez-vous vraiment supprimer ce message ?")) {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log("Message supprimé !");
                        }
                    };
                    xhr.open("GET", "supprimer_messages.php?id=' . $row['id'] . '", true);
                    xhr.send();
                }
            });
            </script>';

                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "Aucun message reçu.";
        }

        // Fermer la connexion à la base de données
        $connexion = null;
        ?>



    </div>

</body>


</html>