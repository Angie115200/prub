

function ModificarS(obj){
    mcodigo = document.getElementById('codSalida');

    mcodigo.value = obj.children[0].innerHTML;
   
}

function abrir(){
    document.getElementById('ContenedorDetalle').style.display="block";
}

function ocultar(){
    document.getElementById('ContenedorDetalle').style.display="none";
}

function EliminarS(obj){
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
        confirmButtonText: 'SIIi, Borralo!',
        cancelButtonText: 'No, cancelelo!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
        swalWithBootstrapButtons.fire(
            'Salida',
            'La salida ha sido eliminado',
            'success'
        )
        window.location = "index.php?ruta=ConsultaS&elimina="+obj.children[0].innerHTML;
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