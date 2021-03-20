var tabla
//ejecutar el inicio
function init() {
    mostrarform(false);
    listar();
    $("#formularioe").on("submit",function(e){
        guardaryeditar(e);
    });

    $("#btnHora").click(function(e){
        e.preventDefault();
        especialidad=$("#especialidad_idespecialidad").val();
        personaMedico=$("#personaMedico_idpersona").val();
        fecha=$("#fecha_cita").val();

        $.post("../ajax/agendar.php?op=selecthora",
        {"especialidad_idespecialidad":especialidad,
        "personaMedico_idpersona":personaMedico,
        "fecha_cita":fecha},
        function(data)
    {
        if (data!="null")
        {
            $("#idcita_medica").html(data);
           // $("#hora").selectpicker('refresh');     
            
          
        }
        else
        {
            Swal.fire({
                icon: 'warning',
                title: 'Disponibilidad',
                text: 'No existen horarios disponibles es esa fecha',
                showConfirmButton: false,
                timer: 2500
              });
        }
    });



    });

//listar pacientes en un select
$.post("../ajax/agendar.php?op=selectPaciente",function(r)
  {        
      //console.log(data);
      $("#personaPaciente_idpersona").html(r);
      $("#personaPaciente_idpersona").selectpicker('refresh');
      
  });

//Cargamos los items al select Especialidad
$.post("../ajax/agendar.php?op=selectEspecialidad",function(r)
{        
    //console.log(data);
    $("#especialidad_idespecialidad").html(r);
    $("#especialidad_idespecialidad").selectpicker('refresh');
    
});

//listar especialidad y paciente en un select
$("#especialidad_idespecialidad").change(function(){
    $("#especialidad_idespecialidad option:selected").each(function(){
      idespecialidad= $(this).val();
      $.post("../ajax/agendar.php?op=selectMedico",{idespecialidad:idespecialidad},function(r){         
        $("#personaMedico_idpersona").html(r);
        //$("#personaMedico_idpersona").selectpicker('refresh');
      });
    });
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
        url: "../ajax/agendar.php?op=guardaryeditar",
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



init();