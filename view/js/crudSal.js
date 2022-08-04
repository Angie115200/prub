function IdPro(obj){
    codP = document.getElementById('codProducto');
    nombreP = document.getElementById('NombreP');

    codP.value = obj.children[0].innerHTML;
    nombreP.value = obj.children[1].innerHTML;
}

function abrir(){
    document.getElementById('Items').style.display="block";
}
function cerrar(){
    document.getElementById('Items').style.display="none";
}

function abrirC(){
    document.getElementById('ContainerC').style.display="block";
}