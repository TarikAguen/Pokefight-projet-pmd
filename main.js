// SOUND

let audio = document.querySelector(".audio");
let playPauseBTN = document.querySelector(".playPauseBTN");
let count = 0;

function playPause() {
  if (count == 0) {
    count = 1;
    audio.play();
    playPauseBTN.innerHTML = "Pause";
  } else {
    count = 0;
    audio.pause();
    playPauseBTN.innerHTML = "Listen";
  }
}

// FIN SOUND

let goldUser = 0;
let victory = 0;
let playerHpBar;
let enemyHpBar;
let cookies = document.cookie;
let str = cookies.split(";");
let pokemonIndex = 1;

// Permet de parcourir les éléments d'un tableau
str.map((cookie) => {
  if (cookie.includes("pokemonChosen")) {
    pokemonIndex = cookie.substring(15);
    // console.log(cookie.substring(15));
  }
});

// Definition de la classe
class characterTemplate {
  // On règles les différentes propriétés
  // Un personnage devra avoir de la vie, des dégâts et un nom
  constructor(hp, hpmax, str, spd, def, name) {
    this.hp = hp;
    this.hpmax = hpmax;
    this.str = str;
    this.spd = spd;
    this.def = def;
    this.name = name;

    // On créé la fonction qui permet d'attaquer, this, l'instance qui appelle la fonction, inflige ses dégâts à la target, l'instance qui subit la fonction
    this.attack = function (target) {
      // On enlève les dégât de l'attaquant à la vie de la cible
      target.hp -= this.str;
      console.log(
        this.name + " attaque " + target.name + " pour " + this.str + " dégâts"
      );
      console.log("Il reste " + target.hp + " points de vie à " + target.name);
      // On vérifie si la cible est à 0 point de vie
      if (target.hp <= 0) {
        target.hp = 0;
        endGame(this);

        console.log(target.name + " a perdu !");

        console.log(goldUser);
        display.innerHTML = " COMBAT FINITO AKHY";
        setTimeout(function () {
          window.location.href = "../profil.php";
        }, 5000);
      }
      if (this.hp <= 0) {
        this.hp = 0;
        endGame(target);
        console.log(this.name + " a perdu !");

        console.log(goldUser);
      }
      enemyHpBar = target.hp / target.hpmax;
      document.querySelector(".currentHpEnemy").style.transform =
        "scaleX(" + enemyHpBar + ")";
      playerHpBar = this.hp / this.hpmax;
      document.querySelector(".currentHpJoueur").style.transform =
        "scaleX(" + playerHpBar + ")";
    };
  }
}

// On fait deux instances de l'objet characterTemplate, l'une pour le joueur, l'autre pour l'adversaire
// Dans cet exemple j'ai rajouté une valeur aléatoire à la vie et aux dégâts des personnages

// CREATION POKEMON
const ronflex = new characterTemplate(
  1500,
  1500,
  20 + Math.floor(Math.random() * 20),
  2,
  15,
  "Ronflex"
);

const Mew = new characterTemplate(
  400,
  400,
  20 + Math.floor(Math.random() * 80),
  6,
  10,
  "Mew"
);

const pikachu = new characterTemplate(
  400,
  400,
  20 + Math.floor(Math.random() * 100),
  8,
  10,
  "Pikachu"
);

const arcanin = new characterTemplate(
  400,
  400,
  20 + Math.floor(Math.random() * 85),
  5,
  10,
  "Arcanin"
);

const jungko = new characterTemplate(
  400,
  400,
  20 + Math.floor(Math.random() * 100),
  10,
  0,
  "Jungko"
);

const geratina = new characterTemplate(
  400,
  400,
  20 + Math.floor(Math.random() * 60),
  5,
  20,
  "Geratina"
);

// FIN CREATION POKEMON

// Selection pokemon

const pokemonList = [ronflex, arcanin, geratina, Mew, pikachu, jungko];

const playerCharacter = pokemonList[pokemonIndex - 1];
// Entrée arène
console.log(
  playerCharacter.name +
    " entre dans l'arène, il a " +
    playerCharacter.hp +
    " point de vie, et " +
    playerCharacter.str +
    " dégâts"
);

// Liste aléatoire combat pokemon ennemi
let pokemonListRdm =
  pokemonList[Math.floor(Math.random() * (pokemonList.length - 1))];
let enemyCharacter = pokemonListRdm;

console.log(
  enemyCharacter.name +
    " entre dans l'arène, il a " +
    enemyCharacter.hp +
    " point de vie, et " +
    enemyCharacter.str +
    " dégâts"
);

switch (enemyCharacter) {
  case 1:
    enemy.background = URL("../gif-sprite/ronron.gif");
    break;

  case 2:
    enemy.background = URL("../gif-sprite/arcaninGif.gif");
    break;

  case 3:
    enemy.background = URL("../gif-sprite/geratinaStart.gif");
    break;

  case 4:
    enemy.background = URL("../gif-sprite/mewGif.gif");
    break;

  case 5:
    enemy.background = URL("../gif-sprite/pikachuGif.gif");
    break;
  case 6:
    enemy.background = URL("../gif-sprite/jungkoGif");
    break;
}

// Cette fonction détermine qui joue en premier et lance l'attaque tant qu'aucun des 2 ont des hp
function tour(playerCharacter, enemyCharacter) {
  if (playerCharacter.speed < enemyCharacter.speed) {
    attackAnimation(enemy);
    enemyCharacter.attack(playerCharacter);
    if (playerCharacter.hp > 0) {
      attackAnimation2(player);
      playerCharacter.attack(enemyCharacter);
    }
  } else {
    attackAnimation(player);
    playerCharacter.attack(enemyCharacter);
    if (enemyCharacter.hp > 0) {
      attackAnimation2(enemy);
      enemyCharacter.attack(playerCharacter);
    }
  }
}
const player = document.getElementById("playerCharacter");
const enemy = document.getElementById("enemyCharacter");
// player.innerText = playerCharacter.name;
// enemy.innerText = enemyCharacter.name;

let intervalTour;
const startButton = document.getElementById("start");

// Fonction qui signe l'arrêt du jeu, incrémente la victoire et gold et met le gagnant en surbrillance
function endGame(winner) {
  if (winner === playerCharacter) {
    goldUser += 2;
    victory += 1;
    console.log("SALOPE");
    if (enemyCharacter.hp <= 0) {
      let url = new URL(
        "./gif-sprite/" + enemyCharacter.name + "Death.gif",
        window.location.href
      );
      enemy.src = url;
      console.log(url);
    }
  }
}

let play = function () {
  document.getElementById("audio").play();
};

function attackAnimation(movingItem) {
  movingItem.animate(
    [
      // étapes/keyframes
      { transform: "translateX(0px)" },
      { transform: "translateX(300px)" },
    ],
    {
      // temporisation
      duration: 1000,
      iterations: 1,
    }
  );
}
function attackAnimation2(movingItem) {
  movingItem.animate(
    [
      // étapes/keyframes
      { transform: "translateY(0px)" },
      { transform: "translateX(-300px)" },
    ],
    {
      // temporisation
      duration: 1000,
      iterations: 1,
    }
  );
}

const display = document.querySelector("#time");
let currentDuration;

const startTimer = (duration, display) => {
  currentDuration = duration;
  const timer = setInterval(() => {
    currentDuration--;
    display.innerHTML = currentDuration;
    if (currentDuration <= 0) {
      clearInterval(timer);
      display.innerHTML = "FIGHT !!";
      display.display = "none";
      intervalTour = setInterval(function () {
        pokemonListRdm =
          pokemonList[Math.floor(Math.random() * (pokemonList.length - 1))];
        if (playerCharacter.hp > 0 && enemyCharacter.hp > 0) {
          tour(playerCharacter, enemyCharacter);
        }
      }, 3000);
    }
  }, 1000);
};

startTimer(3, display);
