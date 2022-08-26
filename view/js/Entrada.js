function ModificarE(obj){
    codigoE = document.getElementById('codEntrada');


    codigoE.value = obj.children[0].innerHTML;
   
    formConsultaE.submit();
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

    function abrir(){
        document.getElementById('ContenedorDetalle').style.display="block";
    }
    
    function ocultar(){
        document.getElementById('ContenedorDetalle').style.display="none";
    }

    
    function ReporteGE(){

        window.open("view/modules/reportes/reporteGE.php");
    }

    function ModificarDT(obj){
        codigoDT = document.getElementById('DTEntrada');
        codigoProd = document.getElementById('codProd');
        cantidad = document.getElementById('cantidad');
        precioU = document.getElementById('precioU')
    
    
        codigoDT.value = obj.children[0].innerHTML;
        cantidad.value = obj.children[2].innerHTML;
        codigoProd.value = obj.children[1].innerHTML;
        precioU.value = obj.children[3].innerHTML;
       
    }