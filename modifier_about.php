<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Portfolio Adel Loukal</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

</head>

<?php
session_start();

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: admin.php");
    exit();
}
?>

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

<style>
    body {
        background-color: #F9F9F9;
    }

    .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        padding: 20px;
        margin-top: 50px;
        margin-bottom: 50px;
    }
</style>

</style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-6">
                            <a href="index.php#about" class="btn btn-dark">Retour</a>
                        </div> <br>
                        <h5 class="card-title">Formulaire de modification</h5>
                        <form method="POST">
                            <div class="form-group">
                                <label for="description">Description à modifier:</label> <br><br>
                                <textarea class="form-control" id="description" name="description"
                                    rows="3"><?php echo $row['description']; ?></textarea> <br>
                            </div>
                            <button type="submit" class="btn btn-primary"
                                onclick="return confirm('Êtes-vous sûr de vouloir enregistrer les modifications ?')">Enregistrer</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    autosize(document.getElementById('description'));
</script>

</html>