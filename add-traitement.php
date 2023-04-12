<?php
// Configuration de la base de données
$host = 'localhost';
$dbname = 'nom_etudiant_portfolio';
$username = 'root';
$password = 'root';

// Connexion à la base de données
try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) { // gerer les erreurs dans la requete
    echo "Erreur : " . $e->getMessage();
    exit();
}

// Vérification de l'extension de l'image
if (isset($_POST['titre'], $_FILES['image']['name'], $_POST['description'], $_POST['categorie'])) {
    $titre = $_POST['titre'];
    $categorie = $_POST['categorie'];
    $image_nom = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $description = $_POST['description'];

    $image_ext = strtolower(pathinfo($image_nom, PATHINFO_EXTENSION));
    if (!in_array($image_ext, ['jpg', 'jpeg', 'png', 'gif'])) {
        // extension invalide
    } else {
        // Sinon extension valide préparation et exécution de la requête d'insertion
        $req = $bdd->prepare("INSERT INTO portfolio (titre, image, description, categorie ) VALUES (:titre, :image, :description, :categorie)");
        $req->execute([
            ':titre' => $titre,
            ':image' => $image_nom,
            ':description' => $description,
            ':categorie' => $categorie
        ]);

        if ($req->rowCount() > 0) {
            // Redirection vers la page de modification du portfolio en cas de succès
            header('Location: modif-portfolio.php');
            exit();
        } else {
            // si erreur, afficher ce mess
            $message = "Erreur : de l'envoi des données dans la base de donnée.";
        }
    }
}
?>