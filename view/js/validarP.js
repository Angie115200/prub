function validarP(e){
    e.preventDefault();

    let nombreP = document.getElementById('NombreP');
    let referenciaP = document.getElementById('Referencia');
    let cantidadP = document.getElementById('Cantidad');
    let disponibilidadP = document.getElementById('Disponibilidad');
    let formulario = document.getElementById('formulario');
    let estado = true;

    if(nombreP.value == ""){
        nombreP.style.borderColor = "red";
        estado = false;
    }
    if(referenciaP.value == ""){
        referenciaP.style.borderColor = "red";
        estado = false;
    }
    if(cantidadP.value == ""){
        cantidadP.style.borderColor = "red";
        estado = false;
    }
    if(disponibilidadP.value == ""){
        disponibilidadP.style.borderColor = "red";
        estado = false;
    }
    if(disponibilidadP.value == "" || cantidadP.value == "" || referenciaP.value == "" || nombreP.value == ""){
        alert("PORFAVOR INGRESE TODOS LOS CAMPOS REQUERIDOS");
    }

    if ( estado == true ) {
        formulario.submit();
    }
}