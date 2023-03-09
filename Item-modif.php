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

if (isset($_POST['id']) && isset($_POST['titre']) && isset($_FILES['image']['name']) && isset($_POST['description'])) {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];


    $image_nom = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    if (!empty($image_nom)) {
        $image_ext = strtolower(pathinfo($image_nom, PATHINFO_EXTENSION));
        if ($image_ext != 'jpg' && $image_ext != 'jpeg' && $image_ext != 'png' && $image_ext != 'gif') {
            echo "Erreur : le fichier doit être une image de type JPG, JPEG, PNG ou GIF.";
            exit();
        }
        move_uploaded_file($image_tmp, "assets/img/portfolio/$image_nom");
    } else {
        $req = $bdd->prepare("SELECT image FROM portfolio WHERE id = :id");
        $req->bindParam(':id', $id);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        $image_nom = $resultat['image'];
    }

    $req = $bdd->prepare("UPDATE portfolio SET titre = :titre, image = :image, description = :description WHERE id = :id");
    $req->bindParam(':titre', $titre);
    $req->bindParam(':image', $image_nom);
    $req->bindParam(':description', $description);
    $req->bindParam(':id', $id);

    if ($req->execute()) {
        echo "Les données ont été modifiées avec succès.";
        header('Location: modif-portfolio.php');
        exit();
    } else {
        echo "Erreur : de la mise à jour des données.";
    }
}

?>