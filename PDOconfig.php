<?php

// Paramètres de connexion 
$host = 'localhost';
$dbname = 'nom_etudiant_portfolio';
$username = 'root';
$password = 'root';

try {
    //  connexion à la base de données
    $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connecté à la base de données!! ";
} catch (PDOException $mess) {
    // Affichage d'un message en cas d'échec de connexion
    echo "Erreur de connexion à la base de données : " . $mess->getMessage();
}

?>