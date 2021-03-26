var tabla
//ejecutar el inicio
function init() {
    mostrarform(false);
    listar();
    $("#formularioe").on("submit",function(e){
        guardaryeditar(e);
    });

    //Cargamos los items al select Especialidad
    $.post("../ajax/horario.php?op=selectEspecialidad",function(r)
    {        
        //console.log(data);
        $("#especialidad_idespecialidad").html(r);
        $("#especialidad_idespecialidad").selectpicker('refresh');
        
    });

    $("#especialidad_idespecialidad").change(function(){
    $("#especialidad_idespecialidad option:selected").each(function(){
        idespecialidad= $(this).val();
        $.post("../ajax/horario.php?op=selectMedico",{idespecialidad:idespecialidad},function(r){         
        $("#personaMedico_idpersona").html(r);
        //$("#personaMedico_idpersona").selectpicker('refresh');
        });
    });
    });


    //mostrar horarios
    $.post("../ajax/horario.php?op=selectHorario&id=",function(r)
    {   
        $("#horarios").html(r);
    });
    fecha_cita.min = new Date().toISOString().split("T")[0];

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
            url: '../ajax/horario.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e){
                console.log(e,responseText);
            }
        },
        "bDestroy":true,
        "iDisplayLength": 10, //paginacion--> cada 5 registros
        "order": [[0, "desc" ]]//ordenar (columna)
    }).DataTable();
}

//funcion guardar o editar
function guardaryeditar(e){
    e.preventDefault(); //no se activa la accion predeterminada del evento
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formularioe")[0]);
    $.ajax({
        url: "../ajax/horario.php?op=guardaryeditar",
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

//funcion para eliminar horarios disponibles
function eliminarHora(idcita_medica)
{
    $.post(
        "../ajax/horario.php?op=eliminar", {idcita_medica : idcita_medica}, function(e)
        {
            tabla.ajax.reload();
            Swal.fire(
                'Eliminado!',
                'La cita fue eliminada correctamente.',
                'success'
              )

        });
}
//Alerta para eliminar horarios disponibles
function alerEliminar(idcita_medica) {
    Swal.fire({
        title: 'Estas seguro de eliminar?',
        text: "No volveras a agendar esta cita",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
            eliminarHora(idcita_medica);
        }
      })
}

init();