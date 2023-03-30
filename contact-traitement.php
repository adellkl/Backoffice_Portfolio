<?php
$host = 'localhost';
$dbname = 'nom_etudiant_portfolio';
$username = 'root';
$password = 'root';

try {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $connexion) {
    echo "Erreur de connexion à la base de données : " . $mess->getMessage();
}

$name = $_POST['nom'];
$email = $_POST['email'];
$subject = $_POST['sujet'];
$message = $_POST['mess'];

$sql = "INSERT INTO contact (nom, email, sujet, mess) VALUES ('$name', '$email', '$subject', '$message')";

if ($connexion->query($sql)) {
    $message = "Merci pour votre message, il est envoyé avec succès";
    header("Location: contact.php?message=$message");
} else {
    $message = "Erreur";
    header("Location: contact.php?message=$message");
}

$connexion = null;
?>