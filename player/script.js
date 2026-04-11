const video = document.getElementById("video");
const playPause = document.getElementById("playPause");
const progress = document.getElementById("progress");
const time = document.getElementById("time");

playPause.addEventListener("click", () => {
  if (video.paused) {
    video.play();
    playPause.textContent = "⏸";
  } else {
    video.pause();
    playPause.textContent = "▶";
  }
});

video.addEventListener("timeupdate", () => {
  progress.value = (video.currentTime / video.duration) * 100;

  const minutes = Math.floor(video.currentTime / 60);
  const seconds = Math.floor(video.currentTime % 60)
    .toString()
    .padStart(2, "0");

  time.textContent = `${minutes}:${seconds}`;
});

progress.addEventListener("input", () => {
  video.currentTime = (progress.value / 100) * video.duration;
});
