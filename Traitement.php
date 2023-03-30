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

if (isset($_POST['username']) && isset($_POST['password'])) {
    $pseudo = $_POST['username'];
    $mdp = $_POST['password'];

    $req = $bdd->prepare("SELECT * FROM users WHERE username=:username");
    $req->bindParam(':username', $pseudo);
    $req->execute();

    $resultat = $req->fetch();

    if ($resultat && password_verify($mdp, $resultat['mdp'])) {

        session_start();
        $_SESSION['username'] = $resultat['username'];
        header('Location: index.php');
        exit();
    } else {

        header('Location: admin.php');

    }
}

?>