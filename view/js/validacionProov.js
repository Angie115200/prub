function validarProov(e){
    e.preventDefault();

    let nombre = document.getElementById('Nombre');
    let Nit = document.getElementById('NIT');
    let Telefono = document.getElementById('Telefono');
    let Empresa = document.getElementById('Empresa');
    let Direccion = document.getElementById('Direccion');
    let estado = true;
    
   

    if(nombre.value == ""){
        nombre.style.borderColor = "red";
        estado = false;
    }
    if(Nit.value == ""){
        Nit.style.borderColor = "red";
        estado = false;
    }
    if(Telefono.value == ""){
        Telefono.style.borderColor = "red";
        estado = false;
    }
    if(Empresa.value == ""){
        Empresa.style.borderColor = "red";
        estado = false;
    }
    if(Direccion.value == ""){
        Direccion.style.borderColor = "red";
        estado = false;
    }
    if(nombre.value == "" || Nit.value == "" || Telefono.value == "" || Empresa.value == "" || Direccion.value == ""){
        alert("PORFAVOR INGRESE TODOS LOS CAMPOS REQUERIDOS");
    }

    if ( estado == true ) {
        formulario.submit();
    }
}