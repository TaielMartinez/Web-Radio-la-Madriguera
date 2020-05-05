var audio_actual_nombre_episodio;
var audio_actual_nombre_podcast;
var audio_actual_id;
var audio_actual_reproductor;
var audio_actual_rangeslider;
var audio_actual_progress;
var inicio = true;

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
            boton_podcast('load', id)
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
        boton_miniReproductor('load')
        //boton_podcast('pause', id)
    }
}

function play_pause_vivo() {
    //console.log(audio.volume)
    if(audio_actual_nombre_podcast == 'vivo' && inicio == false){
        if (audio.paused){
            audio.load()
            boton_vivo('load')
            boton_miniReproductor('load')
            $('.progress_back').hide()
            //console.log('play vivo')
            audio_actual_nombre_podcast = 'vivo'
            audio_actual_id = 'vivo'
        } else {
            audio.pause()
            boton_vivo('play')
            boton_miniReproductor('play')
            //console.log('stop vivo')
        }
    } else {
        $('.audio_source').attr('src', 'http://163.172.8.18:8194/proxy/kmpa?mp=/stream')
        audio.load()
        //audio.volume = 1
        boton_vivo('load')
        boton_miniReproductor('load')
        $('.progress_back').hide()
        console.log('play vivo2')
        inicio = false
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
                    if(JSON.parse(data) == json) {} else {
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
    if(estado == 'load'){
        $('.play_pause_mini').html(`<i class="fas fa-circle-notch fa-spin fa-sm color_letra_blanca"></i>`)
    } else {
        $('.play_pause_mini').html(`<i class="fas fa-`+estado+` fa-sm color_letra_blanca"></i>`)
    }
}

function boton_vivo(estado){
    if(estado == 'load'){
        $('.play_pause_vivo').html(`<i class="fas fa-circle-notch fa-spin fa-5x color-madriguera text-center"></i>`)
    } else {
        $('.play_pause_vivo').html(`<i class="fa fa-`+estado+`-circle fa-5x color-madriguera text-center" aria-hidden="true"></i>`)
    }
}

function boton_podcast(estado, id){
    if(estado == 'load'){
        $('.icon_play_'+id).html(`<i class="fas fa-circle-notch fa-spin fa-5x color-madriguera text-center"></i>`)
    } else {
        $('.icon_play_'+id).html(`<i class="fa fa-`+estado+`-circle fa-5x color-madriguera text-center"></i>`)
    }

    if(estado == 'pause'){
        var rangeslider = document.getElementById("sliderRange");

        rangeslider.oninput = function() {
            $('.icon_play_'+id).html(`<i class="fas fa-circle-notch fa-spin fa-5x color-madriguera text-center"></i>`)
            audio.currentTime = this.value * (audio.duration / 100);
            //console.log(this.value)
        }
    }
}

audio.addEventListener('canplaythrough', function() { 
    audio.play()
    if(audio_actual_nombre_podcast == 'vivo'){
        boton_vivo('pause')
    } else {
        boton_podcast('pause', audio_actual_id)
    }
    boton_miniReproductor('pause')
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









//                ROUTES








var load_view = {}
var load_reproductor = new Array()


$.ajax({
    url: "src/php/check_session.php",
    cache: false
}).done(function(data) {
    if(data == 'true'){
        switch_view('inicio.php')
        $('.alert_login').hide()
        load_navbar()
    } else {
        switch_view('login.html')
    }
})

function switch_view(view) {
    if(load_view.hasOwnProperty(view)){
        $('.routes-vista').html(load_view[view])
    } else {
        $.ajax({
            url: 'src/views/'+view
        }).done(function(data) {
            load_view[view] = data
            $('.routes-vista').html(data)
        })
    }

    if(view == 'vivo.php' && audio_actual_nombre_podcast == 'vivo'){
        //$('.routes-mini_reproductor').hide()
    } else if (view.includes('reproductor.php')){
        var id = view.split('=')[1]
        if(audio_actual_id == id){
            //$('.routes-mini_reproductor').hide()
            $('.rangeslider').show()
        } else {
            $('.rangeslider').hide()
        }
    } else {
        //$('.routes-mini_reproductor').show()
    }
}

function load_navbar() {
    $(".routes-navbar").load("src/layouts/navbar.php")
    $(".routes-mini_reproductor").load("src/layouts/mini_reproductor.php")
}

function player_view_actual(){
    if(audio_actual_nombre_podcast == 'vivo'){
        switch_view('vivo.php')
    } else {
        switch_view('reproductor.php?p='+audio_actual_id)
    }
    
}

window.addEventListener('load', function() {
    window.history.pushState({}, '')
    window.history.pushState({ noBackExitsApp: true }, '')
})

window.addEventListener('popstate', function() {
    window.history.pushState({}, '')
    window.history.pushState({}, '')
    window.history.pushState({}, '')
    window.history.pushState({}, '')
    window.history.pushState({}, '')
    window.history.pushState({}, '')
    if(login == "unlogin") {
        //console.log('no logeado')
    } else {
        switch_view('inicio.php')
        //console.log('lalalal')
    }
})