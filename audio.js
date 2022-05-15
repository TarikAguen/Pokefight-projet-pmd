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
