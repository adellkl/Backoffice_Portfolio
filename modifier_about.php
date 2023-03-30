<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Portfolio Adel Loukal</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

</head>


<br><br>
<?php
session_start();

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: admin.php");
    exit();
}
?>
<div class="col-md-6">
    <a href="index.php#about" class="btn btn-dark">Retour</a>
</div> <br>
<?php
require_once('PDOconfig.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $description = $_POST['description'];

    $query = $connexion->prepare("UPDATE about SET description=:description");

    $query->execute(
        array(
            ':description' => $description
        )
    );

    header("Location: index.php");
    exit();
}


$query = $connexion->query("SELECT * FROM about");
$row = $query->fetch();
?>


<form method="POST">
    <div class="form-group ">
        <label for="description">Description a modifier:</label> <br><br>
        <textarea class="form-control" id="description" name="description"
            rows="3"><?php echo $row['description']; ?></textarea>
    </div> <br>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>