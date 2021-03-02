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
    $("#idcita_medica").val("");
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
            url: '../ajax/cancelarcita.php?op=listar',
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

function mostrar(idcita_medica){
    $.post("../ajax/especialidad.php?op=mostrar",{idcita_medica : idcita_medica}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);
        $("#nombre").val(data.nombre)
        $("#idcita_medica").val(data.idcita_medica)

    });
}


function eliminarCita(idcita_medica)
{
    $.post(
        "../ajax/cancelarcita.php?op=eliminar", {idcita_medica : idcita_medica}, function(e)
        {
            tabla.ajax.reload();
            Swal.fire(
                'Eliminado!',
                'La cita fue eliminada correctamente.',
                'success'
              )
            //alertify.success('CTAAAAA ELIMINADAAAA..........!!!!!!!!!!');

        });
    /*alertify.confirm("CITA MEDICA","¿Estas seguro de eliminar la Cita?",
        function(){
            $.post(
                "../ajax/cancelarcita.php?op=eliminar", {idcita_medica : idcita_medica}, function(e)
                {
                    alertify.alert(e);
                    tabla.ajax.reload();
                    //alertify.success('CTAAAAA ELIMINADAAAA..........!!!!!!!!!!');
        
                });
        },
        function(){
            alertify.error('Cancelado');
        });*/
}

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
            eliminarCita(idcita_medica);
        }
      })
}

init();