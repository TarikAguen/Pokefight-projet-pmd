<?php


// Je me connecte à la base de données : 
$pdo = new PDO('mysql:host=localhost;dbname=pokefight', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));



// Je me connecte à la base de données : 
$pdo = new PDO('mysql:host=localhost;dbname=pokefight', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// var_dump($pdo);

// var_dump($pdo);

// Si la session membre existe, alors je redirige vers l'accueil :
if (isset($_SESSION['user'])) {
  header('location:./profil.php');
}

// Si le form est posté :
if ($_POST) {
  // Je vérifie si je récupère bien les infos :
  // var_dump($_POST);

  // Je récupère les infos correspondants à l'email dans la table :




  $r = $pdo->query("SELECT id_user, pseudo, email, mdp FROM user WHERE email = '$_POST[email]'");


  // Si le nombre de résultat est plus grand ou égal à 1, alors le compte existe :
  if ($r->rowCount() >= 1) {
    // Je stock toutes les infos sous forme d'array :
    $user = $r->fetch(PDO::FETCH_ASSOC);
    // Je vérifie si j'ai bien toutes les infos dans l'array :
    // print_r($membre);
    // Si le mot de passe posté correspond à celui présent dans $membre :
    if (password_verify($_POST['mdp'], $user['mdp'])) {
      // Je test si le mdp fonctionne :
      $content .= '<p>email + MDP : OK</p>';
      // J'enregistre les infos dans la session :
      $_SESSION['pseudo'] = $user['pseudo'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['id_user'] = $user['id_user'];

      // Je redirige l'utilisateur vers la page d'accueil :


      header('location:profil.php');
    } else {
      // Le mot de passe est incorrect :
      $content .= '<p>Mot de passe incorrect.</p>';
    }
  } else {
    $content .= '<p>Compte inexistant</p>';
  }
}


?>
<!DOCTYPE html>
<html>

<head>
  <title>Connexion</title>


  <link href="./connexion.css" rel="stylesheet">

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



  <div class="logoCont">
    <img src="./images/pokefight-logo.svg" alt="logo">




    <div class=boardConnexion2>
      <form method="post">

        <div class="adresse">
          <label for="email">Email</Address>:</label>
          <input type="email" name="email" id="email" required>
        </div>



        <div class="adresse">
          <label for="mdp">Password</label>
          <input type="password" name="mdp" id="mdp" required>

        </div>
        <div class="createAccount">
          <a href="./inscription.php" class="createAccount">create an account</a>
        </div>
        <div class="btn">
          <input type="submit" class="seconnecter" value="Next">
        </div>


    </div>
    </form>


</body>


<script src="./audio.js"></script>

</html>