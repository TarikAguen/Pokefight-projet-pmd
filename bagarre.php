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

try {

    //$conn = new PDO($host;$dbname, $username, $password);
    $pdo = new PDO('mysql:host=localhost;dbname=pokefight', 'root', '', array(PDO::ATTR_ERRMODE =>
    PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));





    $SooS = intval($_SESSION['id_user']);


    $pkm = $pdo->prepare("SELECT id_pokemon FROM user 
    WHERE user.id_user = $SooS");
    // $pdo->exec("UPDATE user SET id_pokemon = '$valuePkmId' WHERE id_user = '$SooS';");
    $pkm->execute();
    $pkmFetch = $pkm->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($pkmFetch[0]);
    // print_r($pkmFetch[0]);
    // var_dump($pkmFetch[0]);
    // die();

    // if (isset($pkmFetch)) {
    //     echo
    // }
    // print_r($pkmFetch);
    print_r($pkmFetch[0]['id_pokemon']);

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
    <script src="./main.js" defer></script>
    <title>Bagarre</title>
</head>

<body>
    <div class="battleBoard">
        <div><span class="timer" id="time">3</span></div>
        <div class="playerCharacter" id="playerCharacter">
            <?php

            switch ($pkmFetch[0]['id_pokemon']) {
                case 1;
                    echo '<img src="../gif-sprite/ronflexStart.gif" alt="" />';
                    break;

                case 2;
                    echo '<img src="./gif-sprite/arcaninStart.gif" alt="" />';
                    break;

                case 3;
                    echo '<img src="../gif-sprite/geratinaStart.gif" alt="" />';
                    break;

                case 4;
                    echo '<img src="../gif-sprite/mewStart.gif" alt="" />';
                    break;

                case 5;
                    echo '<img src="../gif-sprite/pikachuStart.gif" alt="" />';
                    break;

                case 6;
                    echo '<img src="../gif-sprite/jungkoStart.gif" alt="" />';
                    break;
            }

            ?>
        </div>
        <div class="enemyCharacter" id="enemyCharacter">
            <?php
            echo '<img src="../gif-sprite/morsay.svg" alt="" width="300px" height="300px" />';


            ?>
        </div>


    </div>



</body>

</html>