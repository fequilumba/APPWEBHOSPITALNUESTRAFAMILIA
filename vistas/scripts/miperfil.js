var tabla
//ejecutar el inicio
function init() {
    contrasenia()
    mostrarform(false);
    listar();
    $("#formulario").on("submit",function(e){
        guardaryeditar(e);
    });
    $("#imagenmuestra").hide();

}

//funcion contrasenia
function contrasenia() {  
    $('#confircontrasenia').keyup(function() {

		var pass1 = $("#contrasenia").val();;
		var pass2 = $("#confircontrasenia").val();;

		if ( pass1 == pass2 ) {
			$('#error2').css("background", "url(../public/img/check.png)");
            $('#text').html('<label> Correcto</label>');
		} else {
			$('#error2').css("background", "url(../public/img/check2.png)");
            $('#text').html('<label> Las contraseñas no coinciden</label>');
		}

	});
}
//funcion limpiar
function limpiar(){
    $("#idpersona").val("");
    $("#cedula").val("");
    $("#nombres").val("");
    $("#apellidos").val("");
    $("#email").val("");
    $("#telefono").val("");
    $("#direccion").val("");
    $("#ciudad_residencia").val("");
    $("#fecha_nacimiento").val("");
    $("#genero").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
    $("#contrasenia").val("");
    $("#confircontrasenia").val("");
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
            url: '../ajax/miperfil.php?op=listar',
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
        url: "../ajax/miperfil.php?op=guardaryeditar",
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
    $.post("../ajax/miperfil.php?op=mostrar",{idpersona : idpersona}, function(data, status)
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
        $("#idpersona").val(data.idpersona);

    });
}
//funcion para descativar especialidades
function desactivar(idpersona)
{
    alertify.confirm("Paciente","¿Estas seguro de desactivar al Paciente?",
        function(){
            $.post(
                "../ajax/miperfil.php?op=desactivar", {idpersona : idpersona}, function(e)
                {
                    //alertify.alert(e);
                    tabla.ajax.reload();
                    alertify.success('Paciente desactivado');
        
                });
        },
        function(){
            alertify.error('Cancelado');
        });
}

function activar(idpersona)
{
    alertify.confirm("Paciente","¿Estas seguro de activar al Paciente?",
        function(){
            $.post(
                "../ajax/miperfil.php?op=activar", {idpersona : idpersona}, function(e)
                {
                    //alertify.alert(e);
                    tabla.ajax.reload();
                    alertify.success('Paciente activado');
        
                });
        },
        function(){
            alertify.error('Cancelado');
        });
}

init();