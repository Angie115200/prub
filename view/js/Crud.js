function Modificar(obj){
    
    cod = document.getElementById('codEmpleado');
    nombre = document.getElementById('Nombre');
    rol = document.getElementById('Rol');
    apellido = document.getElementById('Apellido');
    correo = document.getElementById('Correo');
    cedula = document.getElementById('Cedula');
    telefono = document.getElementById('Telefono');
    contra = document.getElementById("Contraseña")
 
    
    cod.value = obj.children[0].innerHTML;
    nombre.value = obj.children[1].innerHTML;
    apellido.value = obj.children[2].innerHTML;
    contra.value = obj.children[3].innerHTML;
    contra.value = obj.children[4].innerHTML
    correo.value = obj.children[5].innerHTML;
    cedula.value = obj.children[6].innerHTML;
    telefono.value = obj.children[7].innerHTML;
    rol.value = obj.children[8].innerHTML;
    
   
   
 
}

function abrir(){
    document.getElementById('formulario').style.display="block";
}

function cerrar(){
    document.getElementById('formulario').style.display="none";
}
function eliminar(obj){
    
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
        window.location = "index.php?ruta=Conusuario&elimina="+obj.children[0].innerHTML;
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





