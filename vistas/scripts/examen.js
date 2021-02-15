var tabla
//ejecutar el inicio
function init() {
    mostrarform(false);
    listar();
    $("#formularioe").on("submit",function(e){
        guardaryeditar(e);
    });
    //Cargamos los items al select tipo examen
    $.post("../ajax/examen.php?op=selectExamenTipo",function(r)
        {        
            $("#tipo_examen_idtipo_examen").html(r);
            $("#tipo_examen_idtipo_examen").selectpicker('refresh');
        }
    );

}
//funcion limpiar
function limpiar(){
    $("#idexamen").val("");
    $("#nombree").val("");
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
        
        //botones para copiar los registros en diferentes formatos
        buttons:[
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf',
        ],
        "ajax":{
            url: '../ajax/examen.php?op=listarExamen',
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
        url: "../ajax/examen.php?op=guardaryeditarExamen",
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

function mostrar(idexamen){
    $.post("../ajax/examen.php?op=mostrarExamen",{idexamen : idexamen}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);
        
        $("#tipo_examen_idtipo_examen").val(data.tipo_examen_idtipo_examen);
        $("#tipo_examen_idtipo_examen").selectpicker('refresh');
        $("#nombree").val(data.nombre);
        $("#idexamen").val(data.idexamen);

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