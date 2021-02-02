var tabla
//ejecutar el inicio
function init() {
    mostrarform(false);
    listar();
    $("#formulariocita").on("submit",function(e){
        guardaryeditar(e);
    });

    //Cargamos los items al select Especialidad
    $.post("../ajax/cita.php?op=selectEspecialidad",function(r)
        {        
            $("#especialidad_idespecialidad").html(r);
            $("#especialidad_idespecialidad").selectpicker('refresh');
        }
    );
    //recargamos la lsita de medicos segun la especialidad
    $("#especialidad_idespecialidad").change(function(){
        $("#especialidad_idespecialidad option:selected").each(function(){
          idespecialidad= $(this).val();
          $.post("../ajax/cita.php?op=selectMedico",{idespecialidad:idespecialidad},function(r){         
            $("#personaMedico_idpersona").html(r);
            //$("#personaMedico_idpersona").selectpicker('refresh');
          });
        });
    });
    //Cargamos los items al select Estado
    $.post("../ajax/cita.php?op=selectEstado",function(r)
        {        
            //console.log(data);
            $("#estado_idestado").html(r);
            //$("#especialidad_idespecialidad").selectpicker('refresh');
            
        }
    );
    //Cargamos los items al select Paciente
    $.post("../ajax/cita.php?op=selectPaciente",function(r)
        {        
            //console.log(data);
            $("#personaPaciente_idpersona").html(r);
            $("#personaPaciente_idpersona").selectpicker('refresh');
            
        }
    );
    $.post("../ajax/cita.php?op=selectHorario",function(r)
        {        
            //console.log(data);
            $("#horario_idhorario").html(r);
            $("#horario_idhorario").selectpicker('refresh');
        }
    ); 
}
//funcion limpiar
function limpiar(){
    $("#idcita_medica").val("");
    $("#especialidad_idespecialidad").val("");
    $("#personaPaciente_idpersona").val("");
    $("#personaMedico_idpersona").val("");
    $("#fecha_cita").val("");
    $("#diagnostico").val("");
    $("#sintomas").val("");
    $("#motivo_consulta").val("");
    $("#horario_idhorario").val("");
    $("#estado_idestado").val("");
}
function habilitar() {
    $("#especialidad_idespecialidad").prop("disabled", false);
    $("#personaPaciente_idpersona").removeAttr('disabled');
    $("#medico").show();
    $("#horario_idhorario").removeAttr('disabled');
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
        //$("#formularioreceta").hide();
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//cancelar form
function cancelarform(){
    limpiar();
    habilitar();
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
            url: '../ajax/cita.php?op=listar',
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
        url: "../ajax/cita.php?op=guardaryeditar",
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
    $.post("../ajax/cita.php?op=mostrar",{idcita_medica : idcita_medica}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#especialidad_idespecialidad").val(data.especialidad_idespecialidad);
        $('#especialidad_idespecialidad').selectpicker('refresh');
        $("#personaPaciente_idpersona").val(data.personaPaciente_idpersona);
        $("#personaPaciente_idpersona").selectpicker('refresh');
        $("#medico").hide();
        //$("#personaMedico_idpersona").val(data.personaMedico_idpersona);
        //$('#personaMedico_idpersona').selectpicker('refresh');
        $("#fecha_cita").val(data.fecha_cita);
        $("#diagnostico").val(data.diagnostico);
        $("#sintomas").val(data.sintomas);
        $("#motivo_consulta").val(data.motivo_consulta);
        $("#horario_idhorario").val(data.horario_idhorario);
        $("#horario_idhorario").selectpicker('refresh');
        $("#estado_idestado").val(data.estado_idestado);
        $("#estado_idestado").selectpicker('refresh');
        $("#idcita_medica").val(data.idcita_medica);
    });
}

/*function eliminar(idcita_medica)
{ 
    alertify.confirm("CITA","¿Estas seguro de eliminar la cita?",
        function(){
            $.post(
                "../ajax/cita.php?op=eliminar", {idcita_medica : idcita_medica},
                function(e)
                {
                    //alertify.alert(e);
                    tabla.ajax.reload();
                    alertify.success('Cita eliminada');
                }
            );
        },
        function(){
            alertify.error('Cancelado');
        });
}*/

init();