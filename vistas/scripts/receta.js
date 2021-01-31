var tabla
//ejecutar el inicio
function init() {
    mostrarform(false);
    listar();
    $("#formulariocita").on("submit",function(e){
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
}
//funcion limpiar
function limpiar(){
    $("#idreceta").val("");    
    $("#seleccita").val("");
    $("#observaciones").val("");
    $("#medicamentos").val("");
    $("#especialidad").val("");
    $("#paciente").val("");
    $("#fecha_cita").val("");
    $("#hora_cita").val("");

}
//mostrar formulario
function mostrarform(flag){
    limpiar();
    if(flag){
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        ocultarInput();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
    }else{
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//cancelar form
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
            url: '../ajax/receta.php?op=listar',
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
    e.preventDefault();
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulariocita")[0]);
    $.ajax({
        url: "../ajax/receta.php?op=guardaryeditar",
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

function ver(idreceta){
    $.post("../ajax/receta.php?op=ver",{idreceta : idreceta}, function(data, status)
    {
        data = JSON.parse(data);
        //mostrarform(true);
        $("#listadoregistros").hide();
        bloquearInput();
        $("#formularioregistros").show();
        $("#btnGuardar").hide();
        $("#selectCita").hide();
        $("#btnagregar").hide();
        $("#observaciones").val(data.observaciones); 
        $("#medicamentos").val(data.medicamentos);
        $("#especialidad").val(data.especialidad);
        $("#paciente").val(data.paciente);
        $("#fecha_cita").val(data.fecha_cita);
        $("#hora_cita").val(data.hora_cita);
        $("#idreceta").val(data.idreceta);
    });
}

function mostrar(idreceta){
    $.post("../ajax/receta.php?op=mostrar",{idreceta : idreceta}, function(data, status)
    {
        data = JSON.parse(data);
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        mostrarInput2();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
        //mostrarform(true);
        $("#idreceta").val(data.idreceta);
        $("#seleccita").val(data.cita_medica_idcita_medica); 
        $("#seleccita").selectpicker('refresh');        
        $("#observaciones").val(data.observaciones); 
        $("#medicamentos").val(data.medicamentos);
        $("#especialidad").val(data.especialidad);
        $("#paciente").val(data.paciente);
        $("#fecha_cita").val(data.fecha_cita);
        $("#hora_cita").val(data.hora_cita);
    });
}

function bloquearInput() {
        $("#observaciones").prop('disabled', true); 
        $("#medicamentos").prop('disabled', true);
        $("#especialidad").prop('disabled', true);
        $("#paciente").prop('disabled', true);
        $("#fecha_cita").prop('disabled', true);
        $("#hora_cita").prop('disabled', true);
        $("#idreceta").prop('disabled', true);
        $("#divespecialidad").show();
        $("#divpaciente").show();
        $("#divfecha_cita").show();
        $("#divhora_cita").show();
}
function ocultarInput(){
        $("#btnGuardar").show();
        $("#selectCita").show();
        $("#observaciones").prop('disabled', false);
        $("#medicamentos").prop('disabled', false);
        $("#divespecialidad").hide();
        $("#divpaciente").hide();
        $("#divfecha_cita").hide();
        $("#divhora_cita").hide();
}
function mostrarInput2(){
    $("#btnGuardar").show();
    $("#selectCita").hide();
    $("#observaciones").prop('disabled', false);
    $("#medicamentos").prop('disabled', false);
    $("#divespecialidad").hide();
    $("#divpaciente").hide();
    $("#divfecha_cita").hide();
    $("#divhora_cita").hide();
}

function mostrarInput(){
        $("#observaciones").prop('disabled', false); 
        $("#medicamentos").prop('disabled', false);
        $("#btnGuardar").show();
}

/*function eliminar(idcita_medica)
{
   /*alertify.confirm("CITA","¿Estas seguro de eliminar la cita?",function(result){
        if(result)
        {
            $.post(
                "../ajax/cita.php?op=eliminar", {idcita_medica : idcita_medica},
                function(e)
                {
                    bootbox.alert(e);
                    tabla.ajax.reload();
                }
            );
        }
    });

    alertify.confirm("receta","¿Estas seguro de eliminar la receta?",
        function(){
            $.post(
                "../ajax/receta.php?op=eliminar", {idcita_medica : idcita_medica},
                function(e)
                {
                    //alertify.alert(e);
                    tabla.ajax.reload();
                    alertify.success('receta eliminada');
                }
            );
        },
        function(){
            alertify.error('Cancelado');
        });
}*/

init();