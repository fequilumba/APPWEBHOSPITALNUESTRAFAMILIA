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

function mostrar(idpedido_examen){
    $.post("../ajax/verexamen.php?op=mostrar",{idpedido_examen : idpedido_examen}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);
        $("#especialidad").val(data.especialidad);
        $("#paciente").val(data.paciente);
        $("#medico").val(data.medico);
        $("#idpedido_examen").val(data.idpedido_examen);

    });
    $.post("../ajax/verexamen.php?op=listarDetalle&id="+idpedido_examen,function(r){
        $("#examenes").html(r);
});
}

init();