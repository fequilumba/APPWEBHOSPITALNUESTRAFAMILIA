var tabla
//ejecutar el inicio
function init() {
    mostrarform(false);
    listar();
    $("#formulariocita").on("submit",function(e){
        guardaryeditar(e);
    });

    //Cargamos los items al select Especialidad
    $.post("../ajax/receta.php?op=selectEspecialidad",function(r)
        {        
            //console.log(data);
            $("#especialidad_idespecialidad").html(r);
            //$("#especialidad_idespecialidad").selectpicker('refresh');
            
        }
    );
    //Cargamos los items al select Estado
    $.post("../ajax/receta.php?op=selectEstado",function(r)
        {        
            //console.log(data);
            $("#estado_idestado").html(r);
            //$("#especialidad_idespecialidad").selectpicker('refresh');
            
        }
    );
    //Cargamos los items al select Paciente
    $.post("../ajax/receta.php?op=selectPaciente",function(r)
        {        
            //console.log(data);
            $("#persona_idpersona").html(r);
            $("#persona_idpersona").selectpicker('refresh');
            
        }
    );
    $.post("../ajax/receta.php?op=selectHorario",function(r)
        {        
            //console.log(data);
            $("#horario_idhorario").html(r);
            //$("#especialidad_idespecialidad").selectpicker('refresh');
            
        }
    ); 
}
//funcion limpiar
function limpiar(){
    $("#idrecera").val("");
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
            //alertify.success('Cita registrada');
            tabla.ajax.reload();
        }
    });
    limpiar();
}

function mostrar(idcita_medica){
    $.post("../ajax/receta.php?op=mostrar",{idcita_medica : idcita_medica}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);
        bloquear();
        $("#observaciones").val(data.observaciones); 
        $("#medicamentos").val(data.medicamentos);
        $("#especialidad").val(data.especialidad);
        $("#paciente").val(data.paciente);
        $("#fecha_cita").val(data.fecha_cita);
        $("#hora_cita").val(data.hora_cita);
        $("#idreceta").val(data.idreceta);
    });
}

function bloquear() {
    $("#observaciones").prop('disabled', true); 
        $("#medicamentos").prop('disabled', true);
        $("#especialidad").prop('disabled', true);
        $("#paciente").prop('disabled', true);
        $("#fecha_cita").prop('disabled', true);
        $("#hora_cita").prop('disabled', true);
        $("#idreceta").prop('disabled', true);
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