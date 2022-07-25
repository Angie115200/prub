function ModificarProvee(obj){
    codProveedor = document.getElementById('codProveedor');
    nombre = document.getElementById('Nombre');
    Nit = document.getElementById('NIT');
    Empresa = document.getElementById('Empresa');
    Direccion = document.getElementById('Direccion');
    Telefono = document.getElementById('Telefono');

    codProveedor.value = obj.children[0].innerHTML;
    nombre.value = obj.children[1].innerHTML;
    Nit.value = obj.children[2].innerHTML;
    Empresa.value = obj.children[3].innerHTML;
    Direccion.value = obj.children[4].innerHTML;
    Telefono.value = obj.children[5].innerHTML;
}

function abrir(){
    document.getElementById('formulario').style.display="block";
}

function cerrar(){
    document.getElementById('formulario').style.display="none";
}
function EliminarProvee(obj){
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
        'Producto',
        'El producto ha sido eliminado',
        'success'
    )
    window.location = "index.php?ruta=Conproveedor&elimina="+obj.children[0].innerHTML;
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
})
}