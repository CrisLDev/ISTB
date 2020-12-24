function disable() {
    document.getElementById("button-prevent-multiple-submits").disabled = true;
    document.getElementById("button-prevent-multiple-submits2").disabled = true;
    //document.getElementById("spinner").style.display='inline-block';
    //document.getElementById("btex").innerText='Cargando';
}

$('#customFile').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})

$('#customFileAct').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.act').html(fileName);
})