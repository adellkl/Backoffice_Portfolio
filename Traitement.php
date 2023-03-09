<?php

$host = 'localhost';
$dbname = 'users';
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

    $req = $bdd->prepare("SELECT * FROM users WHERE username=:username AND mdp=:mdp");
    $req->bindParam(':username', $pseudo);
    $req->bindParam(':mdp', $mdp);
    $req->execute();

    $resultat = $req->fetch();

    if ($resultat) {

        session_start();
        $_SESSION['username'] = $resultat['username'];
        header('Location: index.php');
        exit();
    } else {

        header('Location: admin.php');

    }
}

?>