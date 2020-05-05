$( ".new_guardar" ).click(function() {
    var json = crearJson()
    //console.log(json)
    
    $.ajax({
        url: "../../src/php/nuevo_programa.php",
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
        download('programa_export.json')
    }
})

$( ".new_importar" ).click(function() {
    
})

function download(filename) {
    var text = {
        "version": "1.0.0",
        "nombre": $('.new_titulo').val(),
        "subtitulo": $('.new_subtitulo').val(),
        "descripcion": $('.new_descripcion').val(),
        "foto": "",
        "redesSociales": {
            "fb": $('.new_fb').val(),
            "ig": $('.new_ig').val(),
            "tw": $('.new_tw').val(),
            "wp": $('.new_wp').val(),
            "rc": $('.new_rc').val(),
            "yt": $('.new_yt').val(),
            "pe": $('.new_pe').val()
        },
        "descipcionLarga": $('.new_descripcionlarga').val(),
        "tipo": $('.new_tipo').val()
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
    var foto = "";
    if($(".new_foto").val() != ""){

        var file_data = $('.new_foto').prop('files')[0];
        foto = "programas/"+file_data.name
        var form_data = new FormData();
        form_data.append('file', file_data);
        
        $.ajax({
            url: "../../src/php/guardar_foto_programa.php",
            dataType: 'text',  
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(data){
                console.log(data)
            }
        })

    }
    return {
        "version": "1.0.0",
        "nombre": $('.new_titulo').val(),
        "subtitulo": $('.new_subtitulo').val(),
        "descripcion": $('.new_descripcion').val(),
        "foto": foto,
        "redesSociales": {
            "fb": $('.new_fb').val(),
            "ig": $('.new_ig').val(),
            "tw": $('.new_tw').val(),
            "wp": $('.new_wp').val(),
            "rc": $('.new_rc').val(),
            "yt": $('.new_yt').val(),
            "pe": $('.new_pe').val()
        },
        "descipcionLarga": $('.new_descripcionlarga').val(),
        "tipo": $('.new_tipo').val()
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