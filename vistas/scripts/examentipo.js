var tabla
//ejecutar el inicio
function init() {
    mostrarform(false);
    listar();
    $("#formularioe").on("submit",function(e){
        guardaryeditar(e);
    });

}
//funcion limpiar
function limpiar(){
    $("#idtipo_examen").val("");
    $("#nombre").val("");
    $("#descripcion").val("");
}
//mostrar formulario
function mostrarform(flag){
    limpiar();
    if(flag){
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
    }else{
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//funcion cancelar form
function cancelarform(){
    limpiar();
    mostrarform(false);
}
//funcion listar
function listar(){
    tabla=$('#tbllistadoe').dataTable({
        "aProcessing":true,//activar procesamiento del datatable
        "aServerSide": true,//paginacion y filtrado realizados por el servidor
        dom: 'Bfetip',//definir los parametro del control de tabla
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        //botones para copiar los registros en diferentes formatos
        buttons:[
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf',
        ],
        "ajax":{
            url: '../ajax/examen.php?op=listarExamenTipo',
            type: "get",
            dataType: "json",
            error: function(e){
                console.log(e,responseText);
            }
        },
        "bDestroy":true,
        "iDisplayLength": 6, //paginacion--> cada 6 registros
        "order": [[0, "desc" ]]//ordenar (columna)
    }).DataTable();
}

//funcion guardar o editar
function guardaryeditar(e){
    e.preventDefault(); //no se activa la accion predeterminada del evento
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formularioe")[0]);
    $.ajax({
        url: "../ajax/examen.php?op=guardaryeditarExamenTipo",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos){
            alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }
    });
    limpiar();
}

function mostrar(idtipo_examen){
    $.post("../ajax/examen.php?op=mostrarExamenTipo",{idtipo_examen : idtipo_examen}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);
        $("#nombre").val(data.nombre);
        $("#descripcion").val(data.descripcion);
        $("#idtipo_examen").val(data.idtipo_examen);

    });
}

//funcion para descativar examenes
function desactivar(idtipo_examen)
{
    alertify.confirm("Tipo Examen","¿Estas seguro de desactivar el tipo de examen?",
        function(){
            $.post(
                "../ajax/examen.php?op=desactivar", {idtipo_examen : idtipo_examen}, function(e)
                {
                    //alertify.alert(e);
                    tabla.ajax.reload();
                    alertify.success('Tipo Examen desactivado');
        
                });
        },
        function(){
            alertify.error('Cancelado');
        });
}
//funcion para ativar examenes
function activar(idtipo_examen)
{
    alertify.confirm("Tipo Examen","¿Estas seguro de activar el tipo de examen?",
        function(){
            $.post(
                "../ajax/examen.php?op=activar", {idtipo_examen : idtipo_examen}, function(e)
                {
                    //alertify.alert(e);
                    tabla.ajax.reload();
                    alertify.success('Tipo Examen activado');
        
                });
        },
        function(){
            alertify.error('Cancelado');
        });
}
/*function eliminar(idtipo_examen)
{ 
    alertify.confirm("Exámen","¿Estas seguro de eliminar el examen de tipo Imágen?",
        function(){
            $.post(
                "../ajax/examen.php?op=eliminarExamenSangre", {idtipo_examen : idtipo_examen},
                function(e)
                {
                    //alertify.alert(e);
                    tabla.ajax.reload();
                    alertify.success('Exámen eliminado');
                }
            );
        },
        function(){
            alertify.error('Cancelado');
        });
}*/

init();