var tabla
//ejecutar el inicio
function init() {
    mostrarform(false);
    listar();

}
//mostrar formulario
function mostrarform(flag){
    if(flag){
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
    }else{
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        
    }
}

//funcion cancelar form
function cancelarform(){
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
            url: '../ajax/verexamen.php?op=listar',
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

function mostrar(idtipo_examen){
    $.post("../ajax/verexamen.php?op=mostrar",{idtipo_examen : idtipo_examen}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);
        $("#especialidad").val(data.especialidad);
        $("#paciente").val(data.paciente);
        $("#medico").val(data.medico);
        $("#examen").val(data.examen);
        $("#idtipo_examen").val(data.idtipo_examen);

    });
}

init();