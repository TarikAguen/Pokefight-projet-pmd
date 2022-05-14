let goldUser = 0;
let victory = 0;

// Definition de la classe
class characterTemplate {
  // On règles les différentes propriétés
  // Un personnage devra avoir de la vie, des dégâts et un nom
  constructor(hp, str, spd, def, name) {
    this.hp = hp;
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
        endGame(this);
        console.log(target.name + " a perdu !");

        console.log(goldUser);
      }
    };
  }
}

// On fait deux instances de l'objet characterTemplate, l'une pour le joueur, l'autre pour l'adversaire
// Dans cet exemple j'ai rajouté une valeur aléatoire à la vie et aux dégâts des personnages

// CREATION POKEMON
const ronflex = new characterTemplate(
  150,
  20 + Math.floor(Math.random() * 20),
  2,
  15,
  "Ronflex"
);

const Mew = new characterTemplate(
  100,
  20 + Math.floor(Math.random() * 80),
  6,
  10,
  "Mew"
);

const pikachu = new characterTemplate(
  120,
  20 + Math.floor(Math.random() * 100),
  8,
  10,
  "Pikachu"
);

const arcanin = new characterTemplate(
  130,
  20 + Math.floor(Math.random() * 85),
  5,
  10,
  "Arcanin"
);

const jungko = new characterTemplate(
  100,
  20 + Math.floor(Math.random() * 100),
  10,
  0,
  "Jungko"
);

const geratina = new characterTemplate(
  120,
  20 + Math.floor(Math.random() * 60),
  5,
  20,
  "Geratina"
);

// FIN CREATION POKEMON

// Selection pokemon
let selectedStarter = Mew;
const playerCharacter = selectedStarter;
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
const pokemonList = [ronflex, Mew, geratina, pikachu, jungko, arcanin];
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

// Cette fonction détermine qui joue en premier et lance l'attaque tant qu'aucun des 2 ont des hp
function tour(playerCharacter, enemyCharacter) {
  if (playerCharacter.speed < enemyCharacter.speed) {
    attackAnimation(enemy);
    enemyCharacter.attack(playerCharacter);
    if (playerCharacter.hp >= 0) {
      attackAnimation2(player);
      playerCharacter.attack(enemyCharacter);
    }
  } else {
    attackAnimation(player);
    playerCharacter.attack(enemyCharacter);
    if (enemyCharacter.hp >= 0) {
      attackAnimation2(enemy);
      enemyCharacter.attack(playerCharacter);
    }
  }
}
const player = document.getElementById("playerCharacter");
const enemy = document.getElementById("enemyCharacter");
player.innerText = playerCharacter.name;
enemy.innerText = enemyCharacter.name;

let intervalTour;
const startButton = document.getElementById("start");

// Boutton qui lance le combat !
// startButton.addEventListener("click", (e) => {
//   intervalTour = setInterval(function () {
//     pokemonListRdm =
//       pokemonList[Math.floor(Math.random() * (pokemonList.length - 1))];
//     enemyCharacter = pokemonListRdm;
//     tour(playerCharacter, enemyCharacter);
//   }, 3000);
// });

// Fonction qui signe l'arrêt du jeu, incrémente la victoire et gold et met le gagnant en surbrillance
function endGame(winner) {
  clearInterval(intervalTour);

  if (winner === playerCharacter) {
    goldUser += 2;
    victory += 1;
  } else {
    window.location.replace("");
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
      duration: 3000,
      iterations: 1,
    }
  );
}
function attackAnimation2(movingItem) {
  movingItem.animate(
    [
      // étapes/keyframes
      { transform: "translateX(0px)" },
      { transform: "translateX(-300px)" },
    ],
    {
      // temporisation
      duration: 3000,
      iterations: 1,
    }
  );
}

function startTimer(duration, display) {
  var timer = duration,
    seconds;
  setInterval(function () {
    seconds = parseInt(timer % 60, 10);

    display.textContent = seconds;

    if (--timer < 0) {
      timer = duration;
      intervalTour = setInterval(function () {
        pokemonListRdm =
          pokemonList[Math.floor(Math.random() * (pokemonList.length - 1))];
        enemyCharacter = pokemonListRdm;
        tour(playerCharacter, enemyCharacter);
      }, 3000);
    }
  }, 1000);
}

window.onload = function () {
  var threeSeconds = 3,
    display = document.querySelector("#time");
  startTimer(threeSeconds, display);
};
