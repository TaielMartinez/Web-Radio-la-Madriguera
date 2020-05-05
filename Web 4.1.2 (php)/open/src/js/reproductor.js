var time_actualizar;
var rangeslider = document.getElementById("sliderRange");
$( document ).ready(function() {
    var audio = document.getElementById('audio')
    $('.play_pause').on('click', function (){
        play_pause()
    })
    audio.ontimeupdate = function(){
        $('.progress').css('width', audio.currentTime / audio.duration * 100 + '%')
    } // utilizar para mini reproductor

    
    
    rangeslider.oninput = function() { 
        audio.currentTime = this.value * (audio.duration / 100);
        console.log(this.value)
    }
})

function play_pause() {
    if (audio.paused){
        audio.play()
        $('.play_pause').html(`<i class="fa fa-pause-circle fa-5x color-madriguera text-center" aria-hidden="true"></i>`)
        //console.log('play')
        delayedAlert()
    } else {
        audio.pause()
        $('.play_pause').html(`<i class="fa fa-play-circle fa-5x color-madriguera text-center" aria-hidden="true"></i>`)
        //console.log('stop')
    }
}

function delayedAlert() {
    timeoutID = window.setTimeout(actualizarBarra, 1000);
    
}

function actualizarBarra(){
    let val = audio.currentTime / audio.duration * 100
    if(val === 100){
        // termino
        clearAlert()
        return
    }
    console.log(val)
    //$('.myslider').css('background-image', 'linear-gradient(to right, black, black '+val+'%, black '+val+'%')
    rangeslider.value = val
    clearAlert()
    delayedAlert()
}

function clearAlert() {
    window.clearTimeout(timeoutID);
}