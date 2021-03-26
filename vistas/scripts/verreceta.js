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
            url: '../ajax/verreceta.php?op=listar',
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

function mostrar(idreceta){
    $.post("../ajax/verreceta.php?op=mostrar",{idreceta : idreceta}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);
        $("#idreceta").val(data.idreceta);
        $("#especialidad").val(data.especialidad);
        $("#paciente").val(data.paciente);
        $("#medico").val(data.medico);

    });
    $.post("../ajax/verreceta.php?op=listarDetalle&id="+idreceta,function(r){
        $("#medicamentos").html(r);
});
}

init();