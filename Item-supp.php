<?php
$host = 'localhost';
$dbname = 'nom_etudiant_portfolio';
$username = 'root';
$password = 'root';

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); // instanciation d'un objet PDO pour se connecter à la base de données
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // configuration pour générer des exceptions en cas d'erreur
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage(); // affichage de l'erreur
}

// Vérification de la présence de l'id dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id']; // récupération de l'id depuis l'URL
    $req = $bdd->prepare("DELETE FROM portfolio WHERE id = :id"); // préparation de la requête de suppression
    $req->bindParam(':id', $id); // liaison de la variable $id avec le paramètre nommé de la requête
    if ($req->execute()) { // exécution de la requête
        echo "L'item a été supprimé avec succès.";
        header('Location: modif-portfolio.php'); // redirection vers la page modif
        exit();
    } else {
        echo "Erreur : de la suppression de l'item."; // message d'erreur en cas de problème
    }
}
?>