<?php


$host = 'localhost';
$dbname = 'nom_etudiant_portfolio';
$username = 'root';
$password = 'root';

try {

    $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connecté à la base de données!! ";
} catch (PDOException $mess) {

    echo "Erreur de connexion à la base de données : " . $mess->getMessage();
}

?>