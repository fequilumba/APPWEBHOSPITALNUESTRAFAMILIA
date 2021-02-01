var tabla
//ejecutar el inicio
function init() {
    mostrarform(false);
    listar();
    $("#formularioexamen").on("submit",function(e){
        guardaryeditar(e);
    });
    //Cargamos los items al select de cita
    $.post("../ajax/receta.php?op=selectCita",function(r)
        {        
            //console.log(data);
            $("#seleccita").html(r);
            $("#seleccita").selectpicker('refresh');
        }
    );
    /*
    //mostrar examenes de imagen
    $.post("../ajax/examenmedico.php?op=imagen&id=",function(r){
		$("#exameni").html(r);
    });
    //mostrar examenes de sangre
    $.post("../ajax/examenmedico.php?op=sangre&id=",function(r){
		$("#examens").html(r);
	});*/

}
//funcion limpiar
function limpiar(){
    $("#idtipo_examen").val("");
    $("#seleccita").val("");
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
    tabla=$('#tbllistadocita').dataTable({
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
            url: '../ajax/examenmedico.php?op=listar',
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
    var formData = new FormData($("#formularioexamen")[0]);
    $.ajax({
        url: "../ajax/examenmedico.php?op=guardaryeditar",
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
    $.post("../ajax/examenmedico.php?op=mostrar",{idtipo_examen : idtipo_examen}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);
        $("#seleccita").val(data.cita); 
        $("#seleccita").selectpicker('refresh');
        $("#nombre").val(data.nombre);
        $("#idtipo_examen").val(data.idtipo_examen)

    });
}
/*
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
}*/

init();