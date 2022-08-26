function ModificarD(obj){
    codigoD = document.getElementById('codDev');

    codigoD.value = obj.children[0].innerHTML;
   
    formConsultaD.submit();
}

function ModificarDT(obj){
    codigoDT = document.getElementById('DTdevolucion');
    codigoProd = document.getElementById('codProd');
    cantidad = document.getElementById('cantidad');


    codigoDT.value = obj.children[0].innerHTML;
    codigoProd.value = obj.children[1].innerHTML;
    cantidad.value = obj.children[2].innerHTML;
}

function EliminarD(obj){
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
        window.location = "index.php?ruta=ConsultaD&elimina="+obj.children[0].innerHTML;
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

    function ReporteGD(){

        window.open("view/modules/reportes/reporteGD.php");
    }

    function ReporteD(){

        formConsultaD.submit();
    
        window.open("view/modules/reportes/reporteD.php");
    }