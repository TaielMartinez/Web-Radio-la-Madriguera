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
            document.getElementById("StreamAudio").setAttribute('src', "http://163.172.8.18:8194/proxy/kmpa?mp=/stream");
            document.getElementById("StreamAudio").load();
            StreamAudio.play();
        } else {
            StreamAudio.pause();
        }
    toggleButton(); 
    return false; 
};


$(document).ready(function () {

    $('.first-button').on('click', function () {
  
      $('.animated-icon1').toggleClass('open');
    });
    $('.second-button').on('click', function () {
  
      $('.animated-icon2').toggleClass('open');
    });
    $('.third-button').on('click', function () {
  
      $('.animated-icon3').toggleClass('open');
    });
  });

  