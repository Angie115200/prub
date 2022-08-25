function ModificarT(obj){
    codigoE = document.getElementById('codEntrada');

    codigoE.value = obj.children[0].innerHTML;
   
}

function EliminarT(obj){
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
        window.location = "index.php?ruta=ConsultaT&elimina="+obj.children[0].innerHTML;
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