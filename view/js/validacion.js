function validar(e){
    e.preventDefault();

    let nombre = document.getElementById('Nombre');
    let apellido = document.getElementById('Apellido');
    let contra = document.getElementById('Contra');
    let telefono = document.getElementById("Telefono");
    let confirma = document.getElementById('Confirma');
    let cedula = document.getElementById('Cedula');
    let correo = document.getElementById('Correo');
    let formulario = document.getElementById('formulario');
    let estado = true;


    if(nombre.value == ""){
        nombre.style.borderColor = "red";
        estado = false;
    }

    if(contra.value == "" ){
        contra.style.borderColor = "red";
        estado = false;
        
    }
    if(contra.value != confirma.value){
        alert("ASEGURESE QUE LOS CAMPO DE CONTRASEÑA COINCIDAN");
        estado = false;
        
    }

    if(confirma.value == ""){
        confirma.style.borderColor = "red";
        estado = false;
    }

    if(apellido.value == ""){
        apellido.style.borderColor = "red";
        estado = false;
    }

    if(telefono.value == ""){
        telefono.style.borderColor = "red";
        estado = false;
    }

    if(cedula.value == ""){
        cedula.style.borderColor = "red";
        estado = false;
    }

    if(correo.value == ""){
        correo.style.borderColor = "red";
        estado = false;
    }

   

    if ( estado == true ) {
        formulario.submit();
    }
}