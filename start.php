<? include index . php_ini_loaded_file ?>




















<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start</title>
    <link rel="stylesheet" href="./style/reset.css">
    <link rel="stylesheet" href="./start.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    </style>
</head>

<body>
    <div class=audioCont> <audio id="audio" class="audio">
            <source src="./song/ost.mp3" type="audio/mpeg">
        </audio>
        <button class="playPauseBTN" id="playPauseBTN" onclick="playPause()">Listen</button>
    </div>

    <div class="background">
        <img src="images/pokefight-logo.svg" alt="Logo pokefight" class="logo">

        <a href="./inscription.php" class="text">PRESS HERE TO START</a>

    </div>

</body>
<script src="./audio.js"></script>

</html>