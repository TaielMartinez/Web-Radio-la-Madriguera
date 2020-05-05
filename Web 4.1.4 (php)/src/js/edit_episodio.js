var rss_anchor

$.ajax({
    url: "../../src/php/rss_anchor.php",
    method: "GET",
    success: function(data){
        data = JSON.parse(data).channel.item
        rss_anchor = data
        var opciones = "<option>Audio</option>"
        for (let index = 0; index < 9; index++) {
            var nombre = data[index].link.split('https://anchor.fm/a-4-manos/episodes/')[1].split('-')
            var nombre2 = ""
            for (let index = 0; index < nombre.length-1; index++) {
                nombre2 = nombre2+' '+nombre[index]
            }
            opciones = opciones+"<option>"+index+" - "+nombre2+"</option>"
            //console.log(nombre2)
        }
        $('.new_audio').html(opciones)
    }
})





$( ".new_guardar" ).click(function() {
    var json = crearJson()
})

$( ".new_descargar" ).click(function() {
    if($('.new_titulo').val()){
        download($('.new_titulo').val()+'.json')
    } else {
        download('podcast_export.json')
    }
})

$( ".new_importar" ).click(function() {
    
})

function download(filename) {
    var programa = $('.new_tipo').val()
    var id_programa = programa.split(' - ')[0]

    var text = {
        "version": "1.0.0",
        "id_programa": id_programa,
        "nombre": $('.new_titulo').val(),
        "episodio": $('.new_episodio').val(),
        "descripcion": $('.new_descripcion').val(),
        //"fecha": $('.new_fecha').val(),
        "foto": ""
    }
    text = JSON.stringify(text)
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);
  
    element.style.display = 'none';
    document.body.appendChild(element);
  
    element.click();
  
    document.body.removeChild(element);
  }


  function crearJson(){
    var programa = $('.new_tipo').val()
    var nombre_programa = programa.split(' - ')[1]
    var id_programa = programa.split(' - ')[0]
    //console.log(id_programa)

    var foto = "";
    var audio_id = $('.new_audio').val().split(' - ')[0]
    try {
        var audio = rss_anchor[audio_id].enclosure["@attributes"].url
    } catch (error) {
        var audio = ""
    }

    //foto = programa_desde_id(id_programa)
    //console.log(foto)

    if($(".new_foto").val() != ""){
        var file_data = $('.new_foto').prop('files')[0];
        foto = "episodios/"+file_data.name
        var form_data = new FormData();
        form_data.append('file', file_data);
        
        $.ajax({
            url: "../../src/php/guardar_foto_episodio.php",
            dataType: 'text',  
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(data){
                console.log(foto)
                foto = foto
                //return foto

                var json = {
                    "id_programa": id_programa,
                    "nombre": $('.new_titulo').val(),
                    "episodio": $('.new_episodio').val(),
                    "descripcion": $('.new_descripcion').val(),
                    //"fecha": $('.new_fecha').val(),
                    "foto": foto,
                    "audio": audio
                }

                $.ajax({
                    url: "../../src/php/nuevo_episodio.php",
                    method: "POST",
                    cache: false,
                    data: { sql : json},
                    success: function(data){
                        //console.log(data)
                        guardarRss(json)
                    }
                })
            }
        })
    } else {
        $.ajax({
            url: "../../src/php/programa_desde_id.php",
            dataType: 'text',
            cache: false,
            data: {id : id_programa},
            type: 'post',
            success: function(data){
                //console.log(data)
                data2 = JSON.parse(data)
                //console.log(data2.foto)
                foto = "programas/"+data2.foto
                //return data.foto

                var json = {
                    "id_programa": id_programa,
                    "nombre": $('.new_titulo').val(),
                    "episodio": $('.new_episodio').val(),
                    "descripcion": $('.new_descripcion').val(),
                    //"fecha": $('.new_fecha').val(),
                    "foto": foto,
                    "audio": audio
                }

                $.ajax({
                    url: "../../src/php/nuevo_episodio.php",
                    method: "POST",
                    cache: false,
                    data: { sql : json},
                    success: function(data){
                        //console.log(data)
                        guardarRss(json)
                    }
                })
            }
        })
    }
    
    

    function programa_desde_id(id){

        
    }
    
}

function guardarRss(json){
    //console.log(json)
    $.ajax({
        url: "../../src/php/agregar_episodio_en_rss.php",
        dataType: 'text',
        cache: false,
        data: {json : json},
        type: 'post',
        success: function(data){
            //console.log('rss')
            //console.log(data)
        }
    })
}