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
    <title>Bagarre</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
            background-color: rgb(0, 0, 0);
        }

        .battleBoard {
            position: relative;
            height: 100vh;
            width: 100vw;
            background-image: url(../images/fondBattle.png);
            background-repeat: no-repeat;
            border-radius: 30px;
            background-position: center;
            display: flex;
            justify-content: center;
        }

        .playerCharacter {
            position: absolute;
            width: 90px;
            height: 90px;
            bottom: 270px;
            left: 50px;
            /* animation: movePlayer 2sec 1 alternate; */

            background-color: red;
        }

        .enemyCharacter {
            position: absolute;
            width: 90px;
            height: 90px;
            bottom: 270px;
            right: 50px;
            /* animation: moveEnemy 1sec 1 alternate; */
            background-color: black;
        }

        .start {
            position: absolute;
            width: 200px;
            height: 50px;
            top: 50%;
            left: 50%;
        }

        .timer {
            position: absolute;
            bottom: 20;
            right: 50;
            color: aliceblue;
            font-size: 50px;
            text-align: center;
        }
    </style>
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