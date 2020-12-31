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
    }else{
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
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
            dataTyoe: "json",
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
            bootbox.alert(datos);
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
    bootbox.confirm("¿Estas seguro de desactivar la Especialidad?",function(result){
        if(result)
        {
            $.post(
                "../ajax/especialidad.php?op=desactivar",
                {idespecialidad:idespecialidad},
                function(e)
                {
                    bootbox.alert(e);
                    tabla.ajax.reload();
        
                }
            );
        }
    });
}

function activar(idespecialidad)
{
    bootbox.confirm("¿Estas seguro de activar la Especialdiad?",function(result){
        if(result)
        {
            $.post(
                "../ajax/especialidad.php?op=activar",
                {idespecialidad:idespecialidad},
                function(e)
                {
                    bootbox.alert(e);
                    tabla.ajax.reload();
        
                }
            );
        }
    });
}

init();