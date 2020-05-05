var json = "";

$( document ).ready(function() {
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