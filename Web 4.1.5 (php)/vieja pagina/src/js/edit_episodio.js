$.ajax({
    url: "../../src/php/rss_anchor.php",
    method: "GET",
    success: function(data){
        data = JSON.parse(data).channel.item
        console.log(data)
        var opciones = "<option>Audio</option>"
        for (let index = 0; index < 9; index++) {
            var nombre = data[index].link.split('https://anchor.fm/a-4-manos/episodes/')[1].split('-')
            var nombre2 = ""
            for (let index = 0; index < nombre.length-1; index++) {
                nombre2 = nombre2+' '+nombre[index]
            }
            opciones = opciones+"<option>"+index+" - "+nombre2+"</option>"
            console.log(nombre2)
        }
        $('.new_audio').html(opciones)
    }
})





$( ".new_guardar" ).click(function() {
    var json = crearJson()
    console.log(json)
    
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
    console.log(id_programa)

    var foto = "";

    
    return {
        "id_programa": id_programa,
        "nombre": $('.new_titulo').val(),
        "episodio": $('.new_episodio').val(),
        "descripcion": $('.new_descripcion').val(),
        //"fecha": $('.new_fecha').val(),
        "foto": programa_desde_id(id_programa)
    }

    function programa_desde_id(id){

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
                    return foto
                }
            })
        } else {
            $.ajax({
                url: "../../src/php/programa_desde_id.php",
                dataType: 'text',
                cache: false,
                data: {id : id},
                type: 'post',
                success: function(data){
                    return data.foto
                }
            })
        }
    }
    
}

function guardarRss(json){
    //console.log('rss on')
    $.ajax({
        url: "../../src/php/nuevo_rss.php",
        dataType: 'text',  
        cache: false,
        data: {json : json},
        type: 'post',
        success: function(data){
            console.log('rss')
            console.log(data)
        }
    })
}