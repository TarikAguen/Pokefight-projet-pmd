<?php


include('../Projet-Pokefight/index.php');

$host = 'localhost';
$dbname = 'pokefight';
$username = 'root';
$password = '';
// $membre['profil_ami'] = 0;


try {

  //$conn = new PDO($host;$dbname, $username, $password);
  $pdo = new PDO('mysql:host=localhost;dbname=pokefight', 'root', '', array(PDO::ATTR_ERRMODE =>
  PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));



  // echo "Connecté à $dbname sur $host avec succès.";
  // die();



} catch (PDOException $e) {

  die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());
}




// $valuePkmId = 0;
// if (isset($_GET['value'])) {
//   $valuePkmId = $_GET['value'];
// }

// $SooS = $_SESSION['id_user'];

// $pdo->exec("UPDATE user SET id_pokemon = '$valuePkmId' WHERE id_user = '$SooS';");
// var_dump($_SESSION['pseudo']);
// die();

?>
<!-- <a href="?action=deconnexion">Déconnexion</a> -->




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./stylechoices.css" rel="stylesheet">
  <title>Choices</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap%27');
  </style>
</head>

<body>
  <div class=audioCont> <audio id="audio">
      <source src="./song/ost.mp3" type="audio/mpeg">
    </audio>
    <button id="playPauseBTN" onclick="playPause()">Listen</button>
  </div>




  <h1 class="welcome">
    <?php echo $_SESSION['pseudo'] ?> Choose your starter:</h1>

  <div class="choicesStarter">
    <div class="firstRow">
      <div class="pokemon">
        <div class="Img"><a href='./inventory.php?value=1'><img src="./gif-sprite/ronflexStarter.svg" alt=""></a></div>
        <div class="statCont">
          <div class="stat">Health: ??</div>
          <div class="stat">Attack: ??</div>
          <div class="stat">Defense: ??</div>
          <div class="stat"> Speed: ??</div>
        </div>
      </div>
      <div class="pokemon">
        <div class="Img"><a href='./inventory.php?value=2'><img src="./gif-sprite/arcaninStarter.svg" alt=""></a></div>
        <div class="statCont">
          <div class="stat">Health: ??</div>
          <div class="stat">Attack: ??</div>
          <div class="stat">Defense: ??</div>
          <div class="stat"> Speed: ??</div>
        </div>
      </div>
      <div class="pokemon">
        <div class="Img"><a href='./inventory.php?value=3'><img src="./gif-sprite/geratinaStarter.svg" alt=""></a></div>
        <div class="statCont">
          <div class="stat">Health: ??</div>
          <div class="stat">Attack: ??</div>
          <div class="stat">Defense: ??</div>
          <div class="stat"> Speed: ??</div>
        </div>
      </div>
    </div>
    <div class="secondRow">
      <div class="pokemon">
        <div class="Img"><a href='./inventory.php?value=4'><img src="./gif-sprite/mewStarter.svg" alt=""></a></div>
        <div class="statCont">
          <div class="stat">Health: ??</div>
          <div class="stat">Attack: ??</div>
          <div class="stat">Defense: ??</div>
          <div class="stat"> Speed: ??</div>
        </div>
      </div>
      <div class="pokemon">
        <div class="Img"><a href='./inventory.php?value=5'><img src="./gif-sprite/pikachuStarter.svg" alt=""></a></div>
        <div class="statCont">
          <div class="stat">Health: ??</div>
          <div class="stat">Attack: ??</div>
          <div class="stat">Defense: ??</div>
          <div class="stat"> Speed: ??</div>
        </div>
      </div>
      <div class="pokemon">
        <div class="Img"><a href='./inventory.php?value=6'><img src="./gif-sprite/jungkoStarter.svg" alt=""></a></div>
        <div class="statCont">
          <div class="stat">Health: ??</div>
          <div class="stat">Attack: ??</div>
          <div class="stat">Defense: ??</div>
          <div class="stat"> Speed: ??</div>
        </div>
      </div>
    </div>
  </div>


  <script src="./profil.js"></script>
  <script src="./audio.js"></script>


</body>

</html>