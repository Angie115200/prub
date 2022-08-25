function validarSLetras(e){
    key = e.keyCode || e.which;

    teclas = String.fromCharCode(key).toLowerCase();

    letras = " abcdefghijklmñopqrstuvwxyz";

    especiales = "8-37-38-46-164";

    teclado_especial = false;

    for(var i in  especiales){
        if(key==especiales[i]){
            teclado_especial = true;break;
        }
    }
    if(letras.indexOf(teclas) == -1 && !teclado_especial){
        return false;
    }
}