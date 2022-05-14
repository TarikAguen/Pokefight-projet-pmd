<?php
<<<<<<< Updated upstream
// include('index.php');


=======

// Je me connecte à la base de données : 
$pdo = new PDO('mysql:host=localhost;dbname=pokefight', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// var_dump($pdo);
>>>>>>> Stashed changes
// Si la session membre existe, alors je redirige vers l'accueil :
if (isset($_SESSION['user'])) {
  header('location:./profil.php');
}

// Si le form est posté :
if ($_POST) {
  // Je vérifie si je récupère bien les infos :
  // var_dump($_POST);

  // Je récupère les infos correspondants à l'email dans la table :
<<<<<<< Updated upstream
  $r = $pdo->query("SELECT * FROM user WHERE email = '$_POST[email]'");
=======
  $r = $pdo->query("SELECT id_user, pseudo, email, mdp FROM user WHERE email = '$_POST[email]'");
>>>>>>> Stashed changes

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
      $_SESSION['user']['pseudo'] = $user['pseudo'];
      $_SESSION['user']['email'] = $user['email'];
      $_SESSION['user']['mdp'] = $user['mdp'];
      $_SESSION['user']['id_user'] = $user['id_user'];

      // Je redirige l'utilisateur vers la page d'accueil :
<<<<<<< Updated upstream
      header('location:../profil/test.php');
=======
      header('location:profil.php');
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
  <link href="./connexion/connexion.css" rel="stylesheet">
=======
  <link href="./connexion.css" rel="stylesheet">
>>>>>>> Stashed changes

  <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap%27');
  </style>

</head>

<body>

<<<<<<< Updated upstream
<div class="musique"> <img src=img/musique.gif></div>


<div class="logoCont">
  <img src="img/logo.svg" alt="logo">
=======
<img src="./images/BeagleBros-Note.png" class="music" alt="">


<div class="logoCont">
  <img src="./images/pokefight-logo.svg" alt="logo">
>>>>>>> Stashed changes
</div>



  <div class="boardConnexion">
    <div class="returnArrow"><a href="./inscription.php"><img src="../images/return.svg" alt=""></a></div>
    <div class=boardConnexion2>
      <form method="post">
        <div class="adresse">

<<<<<<< Updated upstream
            <label for="email">Adresse mail:</label>
            <input type="email" name="email" id="email" required>
            


        </div>
        <br><br>
        <div class="adresse">
            <label for="mdp">Mot de passe:</label>
            <input type="password" name="mdp" id="mdp" required>
            
        </div>
        <br><br>
        <div class="btn">
            <input type="submit" class="seconnecter" value="Next">
        </div>
=======
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

>>>>>>> Stashed changes
    </div>
    </form>
  </div>


</body>
<<<<<<< Updated upstream
=======
  <script src="./audio.js"></script>
>>>>>>> Stashed changes

</html>