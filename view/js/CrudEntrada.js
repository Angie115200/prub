function abrir(){
    document.getElementById('Items').style.display="block";
}

function abrirD(){
    document.getElementById('Detalle').style.display="block";
}

function cerrarD(){
    document.getElementById('Detalle').style.display="none";
}

function cerrarI(){
    document.getElementById('Items').style.display="none";
}

function ModificarE(obj){
    codigoE = document.getElementById('codEntrada');

    codigoE.value = obj.children[0].innerHTML;
   
}

function EliminarE(obj){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    
    swalWithBootstrapButtons.fire({
        title: 'Desea borrar?',
        text: 'No se podra revertir si se borra!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Borralo!',
        cancelButtonText: 'No, cancelelo!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
        swalWithBootstrapButtons.fire(
            'Salida',
            'La salida ha sido eliminado',
            'success'
        )
        window.location = "index.php?ruta=ConsultaE&elimina="+obj.children[0].innerHTML;
        } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
        ) {
        swalWithBootstrapButtons.fire(
            'Producto',
            'No se elimino',
            'error'
        )
        }
    })}