var rangeslider = document.getElementById("sliderRange");


var audio = document.getElementById('audio')

audio.ontimeupdate = function(){
    $('.progress').css('width', audio.currentTime / audio.duration * 100 + '%')
}



rangeslider.oninput = function() { 
    audio.currentTime = this.value * (audio.duration / 100);
    console.log(this.value)
}

function delayedAlert() {
    timeoutID = window.setTimeout(actualizarBarra, 1000);
}

function actualizarBarra(){
    let val = audio.currentTime / audio.duration * 100
    if(val === 100){
        // termino
        clearAlert()
        return
    }
    console.log(val)
    rangeslider.value = val
    clearAlert()
    delayedAlert()
}

function clearAlert() {
    window.clearTimeout(timeoutID);
}