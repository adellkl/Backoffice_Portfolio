<?php
$host = 'localhost';
$dbname = 'nom_etudiant_portfolio';
$username = 'root';
$password = 'root';

// Vérifier la connexion à la base de données
try {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // permet de configurer le mode de gestion des erreurs pour une connexion à une base de données via l'extension PDO de PHP.
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $connexion) {
    echo "Erreur de connexion à la base de données : " . $mess->getMessage();
    exit();
}

// Vérifier les données entrées dans le formulaire
if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['sujet']) && isset($_POST['mess'])) {

    /*Le paramètre "filter_var" est une fonction PHP qui permet de filtrer et valider les données entrées par les utilisateurs. 
    Cette fonction permet de nettoyer les données pour enlever les caractères spéciaux, les tags HTML et autres caractères, 
    afin de prévenir les attaques de type XSS ou autres vulnérabilités de sécurité.
    */

    $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $sujet = filter_var($_POST['sujet'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['mess'], FILTER_SANITIZE_STRING);

    // Vérifier le format de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Adresse e-mail invalide.";
        header("Location: contact.php?message=$message");
        exit();
    }

    // Vérifier que le champ nom ne contient pas de chiffres ou de caractere speciaux 
    //  Le symbole "/\d/" correspond à un chiffre de 0 à 9 
    if (preg_match('/\d/', $nom)) {
        $message = "Le nom ne doit pas contenir de chiffres.";
        header("Location: contact.php?message=$message");
        exit();
    }

    // Ajouter les données dans la base de données
    $sql = "INSERT INTO contact (nom, email, sujet, mess) VALUES ('$nom', '$email', '$sujet', '$message')";

    if ($connexion->query($sql)) {
        $message = "Merci pour votre message, il est envoyé avec succès";
        header("Location: contact.php?message=$message");
    } else {
        $message = "Erreur";
        header("Location: contact.php?message=$message");
    }
} else {
    $message = "Veuillez remplir tous les champs.";
    header("Location: contact.php?message=$message");
}

// Fermer la connexion à la base de données
$connexion = null;

?>