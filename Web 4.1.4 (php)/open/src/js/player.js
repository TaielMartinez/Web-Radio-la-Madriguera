var audio_actual_nombre_episodio;
var audio_actual_nombre_podcast;
var audio_actual_id;
var audio_actual_reproductor;
var audio_actual_rangeslider;
var audio_actual_progress;

var audio = document.getElementById('audio')


function play_pause_mini_reproductor(){
    if(audio_actual_nombre_podcast == 'vivo'){
        play_pause_vivo()
    } else if(audio_actual_nombre_podcast == undefined){
        play_pause_vivo()
    } else {
        play_pause_podcast(audio_actual_id)
    }
}

function play_pause_podcast(id) {
    if(audio_actual_id == id){
        if (audio.paused){
            audio.play()
            boton_miniReproductor('pause')
            boton_podcast('pause', id)
            $('.progress_back').show()
        } else {
            audio.pause()
            boton_miniReproductor('play')
            boton_podcast('play', id)
        }
    } else {

        $.ajax({
            url: "src/php/id_to_podcast.php?id="+id,
            cache: false
        }).done(function(data) {
            let json = JSON.parse(data)
            let programa = JSON.parse(json.programa)
            let podcast = JSON.parse(json.podcast)
            if(data){
                $('.audio_source').attr('src', podcast.link)
                audio.load()
                $('.progress_back').show()
                audio_actual_id = podcast.id
                audio_actual_nombre_episodio = podcast.nombre
                audio_actual_nombre_podcast = programa.nombre
                datos_miniReproductor()
            }
        })

        
        audio.load()
        boton_miniReproductor('pause')
        boton_podcast('pause', id)
    }
}

function play_pause_vivo() {
    //console.log(audio.volume)
    if(audio_actual_nombre_podcast == 'vivo'){
        if (audio.volume == 0){
            audio.volume = 1
            boton_vivo('pause')
            boton_miniReproductor('pause')
            $('.progress_back').hide()
            //console.log('play vivo')
            audio_actual_nombre_podcast = 'vivo'
            audio_actual_id = 'vivo'
        } else {
            audio.volume = 0
            boton_vivo('play')
            boton_miniReproductor('play')
            //console.log('stop vivo')
        }
    } else {
        $('.audio_source').attr('src', 'http://163.172.8.18:8194/proxy/kmpa?mp=/stream')
        audio.load()
        audio.volume = 1
        boton_vivo('pause')
        boton_miniReproductor('pause')
        $('.progress_back').hide()
        console.log('play vivo2')
        audio_actual_nombre_podcast = 'vivo'
        audio_actual_id = 'vivo'
        $.ajax({
            url: "src/php/programa_vivo.php",
            method: "POST",
            data: { data : true},
            success:function(data) {
                console.log(data)
                if(data === 'musica'){
                    json = data;
                    audio_actual_nombre_episodio = 'Espacio Musical'
                } else {
                    if(JSON.parse(data) == json){} else {
                        json = JSON.parse(data);
                        audio_actual_nombre_episodio = json.nombre
                    }
                }
                datos_miniReproductor()
            }
        })
        
    }
}

function cargar_reproductor(id){
    //console.log('reproductor '+id+audio_actual_id)
    if(audio_actual_id == id){
        boton_podcast('pause', id)


    }

}



function boton_miniReproductor(estado){
    $('.play_pause_mini').html(`<i class="fas fa-`+estado+` fa-sm color_letra_blanca"></i>`)
}

function boton_vivo(estado){
    $('.play_pause_vivo').html(`<i class="fa fa-`+estado+`-circle fa-5x color-madriguera text-center" aria-hidden="true"></i>`)
}

function boton_podcast(estado, id){
    $('.icon_play_'+id).html(`<i class="fa fa-`+estado+`-circle fa-5x color-madriguera text-center"></i>`)

    if(estado == 'pause'){
        var rangeslider = document.getElementById("sliderRange");

        rangeslider.oninput = function() { 
            audio.currentTime = this.value * (audio.duration / 100);
            //console.log(this.value)
        }
    }
}

audio.addEventListener('canplaythrough', function() { 
    audio.play()
    audio.volume = 1
    //console.log('play!')
}, false);





audio.ontimeupdate = function(){
    $('.progress').css('width', audio.currentTime / audio.duration * 100 + '%')
}

audio.ontimeupdate = function(){
    $('.progress').css('width', audio.currentTime / audio.duration * 100 + '%')
}


function datos_miniReproductor() {
    //$('.routes-mini_reproductor').hide()
    $('.navbar_texto_episodio').text(audio_actual_nombre_episodio)
    $('.navbar_texto_programa').text(audio_actual_nombre_podcast)
}