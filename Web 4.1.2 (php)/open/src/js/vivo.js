var json = "";

$( document ).ready(function() {
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
    comprobar_grilla()
    myFunction()
    function myFunction() {
        myVar = setTimeout(comprobar_grilla, 30000);
    }

    
});

function comprobar_grilla() {
    $.ajax({
        url: "src/php/programa_vivo.php",
        method: "POST",
        data: { data : true},
        success:function(data) {
            if(data === 'musica'){
                if(data == json){} else {
                    json = data;
                    $('#vivo_foto').attr("src", 'src/img/logo.jpg');
                    $('#vivo_nombre').text('Espacio Musical');
                    $('#vivo_descripcion').html('Disfruta de la mejor musica para ambientar tus momentos. <br><br> O aprevecha para pasarte y por la seccion INICIO y escuchar los mejores podcast de Radio la Madriguera.');
                }
            } else {
                if(JSON.parse(data) == json){} else {
                    json = JSON.parse(data);
                    $('#vivo_foto').attr("src", json.foto);
                    $('#vivo_nombre').text(json.nombre);
                    $('#vivo_descripcion').text(json.descripcion);
                }
            }
        }
    })
}