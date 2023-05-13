const audioPlayer = document.querySelector('#audio-player');
const playButton = document.querySelector('#play-button');
const pauseButton = document.querySelector('#pause-button');

playButton.addEventListener('click', () => {
    audioPlayer.play();
});

pauseButton.addEventListener('click', () => {
    audioPlayer.pause();
});
