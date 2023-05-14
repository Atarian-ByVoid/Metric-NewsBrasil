const audioPlayer = document.querySelector('#audio-player');
const playButton = document.querySelector('#play-button');
const pauseButton = document.querySelector('#pause-button');
const previousButton = document.querySelector('#previous-button');
const nextButton = document.querySelector('#next-button');

playButton.addEventListener('click', () => {
    audioPlayer.play();
});

pauseButton.addEventListener('click', () => {
    audioPlayer.pause();
});

previousButton.addEventListener('click', () => {
    audioPlayer.currentTime -= 10; // recua 10 segundos
});

nextButton.addEventListener('click', () => {
    audioPlayer.currentTime += 10; // avança 10 segundos
});
