<?php

// Je me connecte à la base de données : 
$pdo = new PDO('mysql:host=localhost;dbname=pokefight', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// var_dump($pdo);


// J'ouvre une session pour y stocker des infos
session_start();
if (!isset($_SESSION)) {
  session_start();
}

// S'il y a une action dans l'URL et si cette action est égal à deconnexion, alors je détruit la session :
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
  session_destroy();
  // Je le rédirige vers l'accueil :
  header('location:../Projet-Pokefight/inscription.php');
}

// Je déclare une variable qui me permet d'afficher des messages pour l'utilisateur
$content = '';








?>





<?php
// include('index.php');
// var_dump($_POST);
// Si la session membre existe, alors je redirige vers l'accueil :
if (isset($_SESSION['user'])) {
  header('location:profil.php');
}

// Si le form a été posté :
if ($_POST) {
  // Je vérifie si je récupère bien les valeurs des champs :
  // print_r($_POST);

  // Je défini une variable pour afficher les erreurs :
  $erreur = '';

  // Si le pseudo n'est pas trop court ou trop long :
  if (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 20) {
    $erreur .= '<p>Taille de prénom invalide.</p>';
  }

  // Si les caractères utilisées dans le champs prénoms sont valides :
  if (!preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo'])) {
    $erreur .= '<p>Format de pseudo invalide.</p>';
  }

  // Je vérifie si l'email n'est pas déjà présent dans la base :
  $r = $pdo->query("SELECT * FROM user WHERE email = '$_POST[email]'");
  // S'il y a un ou plusieurs résultats :
  if ($r->rowCount() >= 1) {
    $erreur .= '<p>Email déjà utilisé.</p>';
  }

  // Je gère les problèmes d'apostrophes pour chaque champs grâce à une boucle :
  foreach ($_POST as $indice => $valeur) {
    $_POST[$indice] = addslashes($valeur);
  }

  // Je hash le mot de passe :
  $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

  // Si $erreur est vide (fonction empty() vérifie si une variable est vide) :
  if (empty($erreur)) {
    // J'envois les infos dans la table en BDD :
    $pdo->exec("INSERT INTO user (pseudo, email, mdp) VALUES ('$_POST[pseudo]', '$_POST[email]', '$_POST[mdp]')");
    $createdId = $pdo->lastInsertId();
    // J'ajoute un message de validation :
    $content .= '<p>Inscription validée !</p>';
    $_SESSION['pseudo'] = $_POST['pseudo'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['id_user'] = $createdId;
  }


  header('location:profil.php');
  // J'ajoute le contenu de $erreur à l'interieur de $content :
  $content .= $erreur;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./style/reset.css" rel="stylesheet">
  <link href="./inscription.css" rel="stylesheet">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap%27');
  </style>
  <!-- <script src="./main.js"></script> -->
  <title>Inscription</title>
</head>

<body>
  <div class=audioCont> <audio id="audio" class="audio">
      <source src="./song/ost.mp3" type="audio/mpeg">
    </audio>
    <button class="playPauseBTN" id="playPauseBTN" onclick="playPause()">Listen</button>
  </div>


  <div class="logoCont">
    <img src="./images/pokefight-logo.svg" alt="logo">
  </div>

  <div class="formContainer">
    <form method="post">

      <div class="Pseudo">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" minlength="3" maxlength="20" required>
      </div>
      <br><br>
      <div class="Pseudo">
        <label for="mdp">Password</label>
        <input type="password" name="mdp" id="mdp" required>
      </div>
      <br><br>
      <div class="Pseudo">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
      </div>

      <div class=btn>
        <input type="submit" class="seconnecter" value="Next">
      </div>

    </form>
  </div>

  <div class="dejaInscris">
    <a class="memberConnexion" href="connexion.php">Already registered ?</a>
  </div>
</body>

<script src="./audio.js"></script>

</html>