<?php


include('../Projet-Pokefight/index.php');

$host = 'localhost';
$dbname = 'pokefight';
$username = 'root';
$password = '';
// $membre['profil_ami'] = 0;

// $valuePkmId = $_GET['value'];
// echo $valuePkmId;
if (isset($_GET['value'])) {
    $valuePkmId = $_GET['value'];
    // echo $valuePkmId;
}

// $SooS = $_SESSION['id_user'];

// $pdo->exec("UPDATE user SET id_pkm = '$valuePkmId' WHERE id_user = '$SooS';");


try {

    //$conn = new PDO($host;$dbname, $username, $password);
    $pdo = new PDO('mysql:host=localhost;dbname=pokefight', 'root', '', array(PDO::ATTR_ERRMODE =>
    PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));



    //echo "Connecté à $dbname sur $host avec succès.";



} catch (PDOException $e) {

    die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());
}
// if (isset($valuePkmId)) {
//   echo 'oui';
// } else {
//   echo 'non';
// }

// echo $_SESSION['name'];



?>














<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style/reset.css" rel="stylesheet">
    <link href="/style/bagarre.css" rel="stylesheet">
    <title>Bagarre</title>
</head>

<body>
    <div class="battleBoard">
        <div class="playerCharacter" id="playerCharacter"></div>
        <div class="enemyCharacter" id="enemyCharacter"></div>
        <div><span class="timer" id="time">3</span></div>

    </div>


</body>
<script src="./main.js"></script>

</html>