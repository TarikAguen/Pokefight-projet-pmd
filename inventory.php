<?php


include('../Projet-Pokefight/index.php');

$host = 'localhost';
$dbname = 'pokefight';
$username = 'root';
$password = '';
// $membre['profil_ami'] = 0;

$valuePkmId = $_GET['value'];
// echo $valuePkmId;
if (isset($_GET['value'])) {
  $valuePkmId = $_GET['value'];
  // echo $valuePkmId;
}

$SooS = $_SESSION['id_user'];

$pdo->exec("UPDATE user SET id_pokemon = '$valuePkmId' WHERE id_user = '$SooS';");


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
  <link href="./styleInventory" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap%27');
  </style>
  <title>Inventory</title>
</head>

<body>
  <div class="myPokemon">
    <?php
    if ($valuePkmId == 1) {
      echo '<img src="gif-sprite/ronflexStarter.svg" alt="" />';
    } else {
    }
    if ($valuePkmId == 2) {
      echo '<img src="gif-sprite/arcaninStarter.svg" alt="" />';
    } else {
    }
    if ($valuePkmId == 3) {
      echo '<img src="gif-sprite/geratinaStarter.svg" alt="" />';
    } else {
    }
    if ($valuePkmId == 4) {
      echo '<img src="gif-sprite/mewStarter.svg" alt="" />';
    } else {
    }
    if ($valuePkmId == 5) {
      echo '<img src="gif-sprite/pikachuStarter.svg" alt="" />';
    } else {
    }
    if ($valuePkmId == 6) {
      echo '<img src="gif-sprite/jungkoStarter.svg" alt="" />';
    } else {
    }

    ?>
  </div>
  <div class="myPseudo">
    <?php echo $_SESSION['pseudo']; ?>
  </div>
  <a href="./stats.php" class="showStats">ALL STATS</a>
  <br>
  <div class="looseCompteur"> LOOSE : </div>
  <br>
  <div class="winCompteur"> WIN :</div>

  <a href="./bagarre.php\$_SESSION['id_user']'" id="start" class="start">Start a game </a>

  <!-- <li><a href=\'' . $_SESSION['id'] . '\'>Mon profil</a></li> -->

</body>

</html>