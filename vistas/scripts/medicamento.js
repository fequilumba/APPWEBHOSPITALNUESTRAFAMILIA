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
    $("#idmedicamento").val("");
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
            url: '../ajax/medicamento.php?op=listar',
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
        url: "../ajax/medicamento.php?op=guardaryeditar",
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

function mostrar(idmedicamento){
    $.post("../ajax/medicamento.php?op=mostrar",{idmedicamento : idmedicamento}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);
        $("#nombre").val(data.nombre);
        $("#descripcion").val(data.descripcion);
        $("#idmedicamento").val(data.idmedicamento);

    });
}

//funcion para descativar examenes
function desactivar(idmedicamento)
{
    alertify.confirm("Medicamento","¿Estas seguro de desactivar el tipo medicamento?",
        function(){
            $.post(
                "../ajax/medicamento.php?op=desactivar", {idmedicamento : idmedicamento}, function(e)
                {
                    //alertify.alert(e);
                    tabla.ajax.reload();
                    alertify.success('Medicamento desactivado');
        
                });
        },
        function(){
            alertify.error('Cancelado');
        });
}
//funcion para ativar examenes
function activar(idmedicamento)
{
    alertify.confirm("Medicamento","¿Estas seguro de activar el medicamento?",
        function(){
            $.post(
                "../ajax/medicamento.php?op=activar", {idmedicamento : idmedicamento}, function(e)
                {
                    //alertify.alert(e);
                    tabla.ajax.reload();
                    alertify.success('Medicamento activado');
        
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