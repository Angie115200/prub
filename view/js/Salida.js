

function ModificarS(obj){
    mcodigo = document.getElementById('codSalida');

    mcodigo.value = obj.children[0].innerHTML;
   
    formConsultaD.submit();
}



function abrirMD(){
    document.getElementById('ContModDev').style.display="block";
}

function ocultarMD(){
    document.getElementById('ContModDev').style.display="none";
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

    function ModificarDT(obj){
        codigoDT = document.getElementById('DTSalida');
        codigoProd = document.getElementById('codProd');
        cantidad = document.getElementById('cantidad');
    
    
        codigoDT.value = obj.children[0].innerHTML;
        cantidad.value = obj.children[1].innerHTML;
        codigoProd.value = obj.children[2].innerHTML;
       
    }

    function ReporteGS(){

        window.open("view/modules/reportes/reporteGS.php");
    }

    function ReporteS(obj){
        mcodigo = document.getElementById('codSalida');
        

        mcodigo = obj.children[0].innerHTML;
       
       
      


        dato = "codSalida="+mcodigo;
        window.open("view/modules/reportes/reporteS.php?"+dato, '_blank');
    }