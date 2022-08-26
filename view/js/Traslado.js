function ModificarT(obj){
    codigoT = document.getElementById('codTraslado');

    codigoT.value = obj.children[0].innerHTML;

    formConsultaT.submit();
   
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
        confirmButtonText: 'Si',
        cancelButtonText: 'No, cancelelo!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
        swalWithBootstrapButtons.fire(
            'Traslado',
            'El taslado ha sido eliminado',
            'success'
        )
        window.location = "index.php?ruta=ConsultaT&elimina="+obj.children[0].innerHTML;
        } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
        ) {
        swalWithBootstrapButtons.fire(
            'Traslado',
            'No se elimino',
            'error'
        )
        }
    })}

    function abrirMD(){
        document.getElementById('ContModDev').style.display="block";
    }
    
    function ocultarMD(){
        document.getElementById('ContModDev').style.display="none";
    }

    function ModificarDT(obj){
        codigoDT = document.getElementById('DTTraslado');
        codigoProd = document.getElementById('codProd');
        cantidad = document.getElementById('cantidad');
    
    
        codigoDT.value = obj.children[0].innerHTML;
        cantidad.value = obj.children[1].innerHTML;
        codigoProd.value = obj.children[2].innerHTML;
       
    }
    function ReporteGT(){

        window.open("view/modules/reportes/reporteGT.php");
    }