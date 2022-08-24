function ModificarP(obj){
    codP = document.getElementById('codProducto');
    nombreP = document.getElementById('NombreP');
    referenciaP = document.getElementById('ReferenciaP');
    disponibilidadP = document.getElementById('DisponibilidadP');

    codP.value = obj.children[0].innerHTML;
    nombreP.value = obj.children[1].innerHTML;
    referenciaP.value = obj.children[2].innerHTML;
    disponibilidadP.value = obj.children[3].innerHTML;

    
    
}


function abrir(){
    document.getElementById('formulario').style.display="block";
}

function cerrar(){
    document.getElementById('formulario').style.display="none";
}


function EliminarP(obj){
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
    window.location = "index.php?ruta=Conproducto&elimina="+obj.children[0].innerHTML;
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

function ReporteP(obj){



    nombreP = obj.children[1].innerHTML;
    referenciaP = obj.children[2].innerHTML;
    disponibilidadP = obj.children[3].innerHTML;

    dato = "referenciaP="+referenciaP+"&nombreP="+nombreP+"&disponibilidadP="+disponibilidadP;
    window.open("view/modules/reportes/reporteProd.php?"+dato, '_blank');
}