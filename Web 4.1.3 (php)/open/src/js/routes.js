var load_vivo, load_inicio;
var load_reproductor = new Array();

$( ".routes-navbar" ).load( "src/layouts/navbar.php");
$( ".routes-mini_reproductor" ).load( "src/layouts/mini_reproductor.php");

routes_inicio()

function routes_inicio(){
    if(load_inicio == undefined){
        $.ajax({
            url: "src/views/inicio.php"
        }).done(function(data) {
            load_inicio = data;
            $('.routes-vista').html(data);
        });
    } else {
        $('.routes-vista').html(load_inicio)
    }
}

function routes_vivo(){
    if(load_vivo == undefined){
        $.ajax({
            url: "src/views/vivo.php"
        }).done(function(data) {
            load_vivo = data;
            $('.routes-vista').html(data);
        });
    } else {
        $('.routes-vista').html(load_vivo)
    }
}

function routes_reproductor(id){
    if(load_reproductor[id] == undefined){
        $.ajax({
            url: "src/views/reproductor.php?p="+id
        }).done(function(data) {
            load_reproductor[id] = data;
            $('.routes-vista').html(data);
        });
    } else {
        $('.routes-vista').html(load_reproductor[id])
    }
}
