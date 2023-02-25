<?php
session_start();

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: admin.php"); // rediriger vers la page de connexion
    exit(); // arrêter l'exécution du script
}
?>

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
        header('Location: index.php#portfolio');
        exit();
    } else {
        echo "Erreur : de la suppression de l'item.";
    }
}

?>