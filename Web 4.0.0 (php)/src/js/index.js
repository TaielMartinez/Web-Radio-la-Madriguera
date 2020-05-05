var StreamAudio = document.getElementById('StreamAudio')
var ctrl = document.getElementById('audioControl')
var playButton = document.getElementById('play')
var pauseButton = document.getElementById('pause')


pauseButton.style.display = 'none'; 
playButton.style.display = 'block'; 


function toggleButton() { 
    if (playButton.style.display === 'none') { 
        playButton.style.display = 'block'; 
        pauseButton.style.display = 'none'; 
    } else { 
        playButton.style.display = 'none'; 
        pauseButton.style.display = 'block'; 
    }} 
    ctrl.onclick = function () { 
        if (StreamAudio.paused) {
            StreamAudio.play();
        } else {
            StreamAudio.pause();
        }
    toggleButton(); 
    return false; 
};


$(document).ready(function () {
    if (window.orientation !== undefined) {
        //document.body.classList.add("mobile");
        console.log('celular')
    } else {
        console.log('computadora')
    }
})