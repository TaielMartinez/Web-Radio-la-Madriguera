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
    switch_view('inicio.php')
})