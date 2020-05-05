var audio_actual_nombre_episodio;
var audio_actual_nombre_podcast = 'vivo';
var audio_actual_id;
var audio_actual_reproductor;

var audio = document.getElementById('audio')
$('.play_pause').on('click', function (){
    console.log('click')
    play_pause()
})

function play_pause_mini_reproductor(){
    if(audio_actual_nombre_podcast == 'vivo'){
        play_pause_vivo()
    }
}

function play_pause_podcast() {
    
    $('.play_pause').html(`<i class="fa fa-pause-circle fa-5x color-madriguera text-center" aria-hidden="true"></i>`)
}

function play_pause_vivo() {
    if(audio_actual_nombre_podcast == 'vivo'){
        if (audio.paused){
            audio.play()
            $('.play_pause_vivo').html(`<i class="fa fa-pause-circle fa-5x color-madriguera text-center" aria-hidden="true" onclick="play_pause_vivo()"></i>`)
            $('.play_pause_mini').html(`<i class="fas fa-pause fa-sm color_letra_blanca"></i>`)
            console.log('play vivo')
            audio_actual_nombre_podcast = 'vivo'
        } else {
            audio.pause()
            $('.play_pause_vivo').html(`<i class="fa fa-play-circle fa-5x color-madriguera text-center" aria-hidden="true" onclick="play_pause_vivo()"></i>`)
            $('.play_pause_mini').html(`<i class="fas fa-play fa-sm color_letra_blanca"></i>`)
            console.log('stop vivo')
        }
    }
}



