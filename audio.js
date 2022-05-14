const music = document.querySelector(".music");
const audio = new Audio("./audio/pokemonaccueil.mp3");

music.addEventListener("click", () => {
  audio.volume = 1;
  audio.loop = true;
  audio.play();
});
