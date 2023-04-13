<?php

$host = 'localhost';
$dbname = 'nom_etudiant_portfolio';
$username = 'root';
$password = 'root';

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); // Instanciation d'un objet PDO pour se connecter à la base de données
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configuration pour générer des exceptions en cas d'erreur
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage(); // Affichage de l'erreur
}

if (isset($_POST['username']) && isset($_POST['password'])) { // Vérification de la présence des variables "username" et "password" dans le tableau POST
    $pseudo = $_POST['username'];
    $mdp = $_POST['password'];

    $req = $bdd->prepare("SELECT * FROM users WHERE username=:username"); // Préparation de la requête de sélection de l'utilisateur correspondant au pseudo entré
    $req->bindParam(':username', $pseudo);
    $req->execute();

    $resultat = $req->fetch();

    if ($resultat && password_verify($mdp, $resultat['mdp'])) { // Vérification que la requête a renvoyé un résultat et que le mot de passe entré correspond à celui stocké dans la base de données

        session_start(); // Démarrage de la session
        $_SESSION['username'] = $resultat['username']; // Stockage du nom d'utilisateur dans une variable de session
        header('Location: index.php'); // Redirection vers la page d'accueil
        exit();
    } else {

        header('Location: admin.php');

    }
}


?>