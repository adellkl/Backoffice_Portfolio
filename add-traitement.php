<?php

$host = 'localhost';
$dbname = 'nom_etudiant_portfolio';
$username = 'root';
$password = 'root';

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


if (isset($_POST['titre']) && isset($_FILES['image']['name']) && isset($_POST['description'])) {
    $titre = $_POST['titre'];
    $image_nom = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $description = $_POST['description'];


    $image_ext = strtolower(pathinfo($image_nom, PATHINFO_EXTENSION));
    if ($image_ext != 'jpg' && $image_ext != 'jpeg' && $image_ext != 'png' && $image_ext != 'gif') {
        echo "Erreur : le fichier doit être une image de type JPG, JPEG, PNG ou GIF.";
        exit();
    }

    $req = $bdd->prepare("INSERT INTO portfolio (titre, image, description) VALUES (:titre, :image, :description)");
    $req->bindParam(':titre', $titre);
    $req->bindParam(':image', $image_nom);
    $req->bindParam(':description', $description);

    if ($req->execute()) {
        echo "Les données ont été enregistrées avec succès.";
        header('Location: index.php#portfolio');
        exit();
    } else {
        echo "Erreur : de l'envoi des données dans la base de donnée.";
    }
}


?>