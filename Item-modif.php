<?php

$host = 'localhost';
$dbname = 'nom_etudiant_portfolio';
$username = 'root';
$password = 'root';

try {
    //connexion à la base de données avec la classe PDO
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    //configuration de PDO pour gérer les erreurs avec des exceptions
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // afficher un message d'erreur si la connexion à la base de données échoue
    echo "Erreur : " . $e->getMessage();
}

if (isset($_POST['id']) && isset($_POST['titre']) && isset($_FILES['image']['name']) && isset($_POST['description']) && isset($_POST['categorie'])) {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $categorie = $_POST['categorie'];

    // récupérer le nom et le chemin temporaire de l'image envoyée dans le formulaire "en local"
    $image_nom = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if (!empty($image_nom)) {
        // vérifier que l'extension de l'image est valide
        $image_ext = strtolower(pathinfo($image_nom, PATHINFO_EXTENSION));
        if ($image_ext != 'jpg' && $image_ext != 'jpeg' && $image_ext != 'png' && $image_ext != 'gif') {
            echo "Erreur : le fichier doit être une image de type JPG, JPEG, PNG ou GIF.";
            exit();
        }
        // déplacer l'image dans le répertoire "assets/img/portfolio"
        move_uploaded_file($image_tmp, "assets/img/portfolio/$image_nom");
    } else {
        // si aucune image n'a été envoyée, récupérer l'ancien nom de l'image dans la base de données
        $req = $bdd->prepare("SELECT image FROM portfolio WHERE id = :id");
        $req->bindParam(':id', $id);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        $image_nom = $resultat['image'];
    }

    // préparer et exécuter la requête de mise à jour des données du portfolio
    $req = $bdd->prepare("UPDATE portfolio SET titre = :titre, image = :image, description = :description, categorie = :categorie WHERE id = :id");
    $req->bindParam(':titre', $titre);
    $req->bindParam(':image', $image_nom);
    $req->bindParam(':description', $description);
    $req->bindParam(':categorie', $categorie);
    $req->bindParam(':id', $id);

    if ($req->execute()) {
        // si la mise à jour a réussi, afficher un message de succès et rediriger vers la page de modification du portfolio
        echo "Les données ont été modifiées avec succès.";
        header('Location: modif-portfolio.php');
        exit();
    } else {
        // sinon, afficher un message d'erreur
        echo "Erreur : de la mise à jour des données.";
    }
}

?>