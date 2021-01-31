var tabla
//ejecutar el inicio
function init() {
    listar();

     
}

//funcion listar
function listar(){
    $("#formularioatencion").hide();
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
            url: '../ajax/cancelarcita.php?op=listar',
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

function eliminar(idcita_medica)
{ 
    alertify.confirm("CITA","¿Estas seguro de eliminar la cita?",
        function(){
            $.post(
                "../ajax/cancelarcita.php?op=eliminar", {idcita_medica : idcita_medica},
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
}

init();