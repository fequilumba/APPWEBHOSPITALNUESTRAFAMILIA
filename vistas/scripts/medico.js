var tabla
//ejecutar el inicio
function init() {
    mostrarform(false);
    listar();
    $("#formulario").on("submit",function(e){
        guardaryeditar(e);
    });

    //Cargamos los items al select especialidad
    $.post("../ajax/medico.php?op=selectEspecialidad",function(r)
        {        
            //console.log(data);
            $("#especialidad_idespecialidad").html(r);
            //$("#especialidad_idespecialidad").selectpicker('refresh');
            
        }
    );
    //mostrar roles
	$.post("../ajax/medico.php?op=roles&id2=",function(r){
		$("#roles").html(r);
	});
    //mostrar especialidades
    $.post("../ajax/medico.php?op=especialidades&id=",function(r)
        {   
            $("#especialidades").html(r);
        });
    $("#imagenmuestra").hide();

}
//funcion limpiar
function limpiar(){
    $("#idpersona").val("");
    $("#usuario_idusuario").val("");
    $("#especialidades").val("");
    $("#cedula").val("");
    $("#nombres").val("");
    $("#apellidos").val("");
    $("#email").val("");
    $("#telefono").val("");
    $("#direccion").val("");
    $("#roles").removeAttr('checked');
    $("#especialidades").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
    $("#ciudad_residencia").val("");
    $("#fecha_nacimiento").val("");
    $("#genero").val("");
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
    tabla=$('#tbllistado').dataTable({
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
            url: '../ajax/medico.php?op=listar',
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
    e.preventDefault();
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/medico.php?op=guardaryeditar",
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

function mostrar(idpersona){
    $.post("../ajax/medico.php?op=mostrar",{idpersona : idpersona}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);
        $("#cedula").val(data.cedula);
        $("#nombres").val(data.nombres);
        $("#apellidos").val(data.apellidos);
        $("#email").val(data.email);
        $("#telefono").val(data.telefono);
        $("#direccion").val(data.direccion);
        $("#ciudad_residencia").val(data.ciudad_residencia);
        $("#fecha_nacimiento").val(data.fecha_nacimiento);
        $("#genero").val(data.genero);
        $("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/usuarios/"+data.imagen);
		$("#imagenactual").val(data.imagen);
        $("#usuario_idusuario").val(data.usuario_idusuario)
        $("#idpersona").val(data.idpersona);

    });
    $.post("../ajax/medico.php?op=roles&id2="+idpersona,function(r){
		$("#roles").html(r);
	});
    $.post("../ajax/medico.php?op=especialidades&id="+idpersona,function(r){
		$("#especialidades").html(r);
    });
    
}
//funcion para descativar medicos
function desactivar(idpersona)
{

    alertify.confirm("Médico","¿Estas seguro de desactivar al Médico?",
        function(){
            $.post(
                "../ajax/medico.php?op=desactivar", {idpersona : idpersona}, function(e)
                {
                    //alertify.alert(e);
                    tabla.ajax.reload();
                    alertify.success('Médico desactivado');
        
                });
        },
        function(){
            alertify.error('Cancelado');
        });
}

function activar(idpersona)
{
    alertify.confirm("Médico","¿Estas seguro de activar al Médico?",
        function(){
            $.post(
                "../ajax/medico.php?op=activar", {idpersona : idpersona}, function(e)
                {
                    //alertify.alert(e);
                    tabla.ajax.reload();
                    alertify.success('Médico activado');
        
                });
        },
        function(){
            alertify.error('Cancelado');
        });
}

init();