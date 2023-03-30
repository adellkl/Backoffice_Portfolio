<?php

// Configuration de la base de données
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


if (isset($_POST['titre']) && isset($_FILES['image']['name']) && isset($_POST['description']) && isset($_POST['categorie'])) {
    $titre = $_POST['titre'];
    $categorie = $_POST['categorie'];
    $image_nom = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $description = $_POST['description'];


    $image_ext = strtolower(pathinfo($image_nom, PATHINFO_EXTENSION));
    if ($image_ext != 'jpg' && $image_ext != 'jpeg' && $image_ext != 'png' && $image_ext != 'gif') {

    } else {

        $req = $bdd->prepare("INSERT INTO portfolio (titre, image, description, categorie ) VALUES (:titre, :image, :description, :categorie)");
        $req->bindParam(':titre', $titre);
        $req->bindParam(':image', $image_nom);
        $req->bindParam(':description', $description);
        $req->bindParam(':categorie', $categorie);


        if ($req->execute()) {
            header('Location: modif-portfolio.php');
            exit();
        } else {
            $message = "Erreur : de l'envoi des données dans la base de donnée.";
        }
    }
}

?>