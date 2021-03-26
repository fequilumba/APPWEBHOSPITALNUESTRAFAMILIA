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
    $("#idespecialidad").val("");
    $("#nombre").val("");
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
            url: '../ajax/especialidad.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e){
                console.log(e,responseText);
            }
        },
        "bDestroy":true,
        "iDisplayLength": 5, //paginacion--> cada 5 registros
        "order": [[0, "desc" ]]//ordenar (columna)
    }).DataTable();
}

//funcion guardar o editar
function guardaryeditar(e){
    e.preventDefault(); //no se activa la accion predeterminada del evento
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formularioe")[0]);
    $.ajax({
        url: "../ajax/especialidad.php?op=guardaryeditar",
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

function mostrar(idespecialidad){
    $.post("../ajax/especialidad.php?op=mostrar",{idespecialidad : idespecialidad}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);
        $("#nombre").val(data.nombre)
        $("#idespecialidad").val(data.idespecialidad)

    });
}
//funcion para descativar especialidades
function desactivar(idespecialidad)
{
    alertify.confirm("Especialidad","¿Estas seguro de desactivar la Especialidad?",
        function(){
            $.post(
                "../ajax/especialidad.php?op=desactivar", {idespecialidad : idespecialidad}, function(e)
                {
                    //alertify.alert(e);
                    tabla.ajax.reload();
                    alertify.success('Especialidad desactivada');
        
                });
        },
        function(){
            alertify.error('Cancelado');
        });
}

function activar(idespecialidad)
{
    alertify.confirm("Especialidad","¿Estas seguro de activar la Especialidad?",
        function(){
            $.post(
                "../ajax/especialidad.php?op=activar", {idespecialidad : idespecialidad}, function(e)
                {
                    //alertify.alert(e);
                    tabla.ajax.reload();
                    alertify.success('Especialidad activada');
        
                });
        },
        function(){
            alertify.error('Cancelado');
        });
}

init();