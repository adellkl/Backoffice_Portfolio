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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $req = $bdd->prepare("DELETE FROM portfolio WHERE id = :id");
    $req->bindParam(':id', $id);
    if ($req->execute()) {
        echo "L'item a été supprimé avec succès.";
        header('Location: modif-portfolio.php');
        exit();
    } else {
        echo "Erreur : de la suppression de l'item.";
    }
}

?>