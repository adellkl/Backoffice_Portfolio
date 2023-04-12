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

// Vérifier si l'id du message a été fourni
if (!isset($_GET['id'])) {
    echo "L'id du message n'a pas été fourni.";
    exit();
}

// Récupérer l'id du message
$id = $_GET['id'];

// Supprimer le message correspondant
$sql = "DELETE FROM contact WHERE id = :id";
$requete = $connexion->prepare($sql);
$requete->bindParam(':id', $id, PDO::PARAM_INT);
$requete->execute();

// Fermer la connexion à la base de données
$connexion = null;
echo '<br><br><br><br>';

header("Location: consult-mail.php?message=supprimer");
exit();

?>