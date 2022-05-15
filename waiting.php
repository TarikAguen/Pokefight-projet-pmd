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

$SooS = $_SESSION['id_user'];

// $pdo->exec("UPDATE user SET id_pokemon = '$valuePkmId' WHERE id_user = '$SooS';");


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

    //echo "Connecté à $dbname sur $host avec succès.";



} catch (PDOException $e) {

    die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());
}




?>






























<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./waiting.css" rel="stylesheet">
    <title>Waiting</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap%27');
    </style>
</head>

<body class="body">
    <div class="loader">
        <div class="contenaire_ball">
            <img class=" ball " src="images/pokeball.gif " alt="ball ">
            <img class="ball " src="images/pokeball.gif " alt="ball ">
            <img class="ball " src="images/pokeball.gif " alt="ball ">

        </div>
        <p class="paragraphe_waiting ">Waiting for pokemon to wake up...</p>
    </div>
    <div class="versus">
        <p>VS</p>



    </div>
    <div class="pkmPlacement">
        <div class="alliePkm">
            <?php

            switch ($pkmFetch[0]['id_pokemon']) {
                case 1;
                    echo 'Ronflex';
                    echo '<img src="./gif-sprite/ronron.gif" alt="" width="200px" height="200px" />';
                    break;

                case 2;
                    echo 'Arcanin';
                    echo '<img src="../gif-sprite/arcaninGif.gif" alt="" width="200px" height="200px"/>';
                    break;

                case 3;
                    echo 'Giratina';
                    echo '<img src="../gif-sprite/geratinaStart.gif" alt="" width="200px" height="200px" />';
                    break;

                case 4;
                    echo 'Mew';
                    echo '<img src="../gif-sprite/mewGif.gif" alt="" width="200px" height="200px" />';
                    break;

                case 5;
                    echo 'Pikachu';
                    echo '<img src="../gif-sprite/pikachuGif.gif" alt="" width="200px" height="200px" />';
                    break;

                case 6;
                    echo 'Jungko';
                    echo '<img src="../gif-sprite/jungkoGif" alt="" width="200px" height="200px"/>';
                    break;
            }

            ?>
        </div>

        <div class="enemyPkm">
            <img src="./gif-sprite/interrogation.gif" alt="">

        </div>
    </div>


    <script>
        setTimeout(function() {
            window.location.href = "./bagarre.php/$_SESSION['id_user']'";
        }, 9000);
    </script>
    <!-- <a href="./bagarre.php\$_SESSION['id_user']'" class="next">NEXT</a> -->





    <script src="waiting.js"></script>

</body>

</html>