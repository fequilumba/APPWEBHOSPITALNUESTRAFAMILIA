var tabla;

//FUNCIÓN QUE SE EJECUTA AL INICIO
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e) {
		guardaryeditar(e);	
    });  
}


//FUNCIÓN LIMPIAR
function limpiar() {
	$("#username").val("");
	$("#contrasenia").val("");
	$("#email").val("");
    $("#imagenmuestra").attr("src","");
    $("#imagenactual").val("");
	$("#idusuario").val("");
}


//FUNCIÓN MOSTRAR FORMULARIO
function mostrarform(flag) {
	limpiar();
	if (flag) {
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	} else {
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}


//FUNCIÓN CANCELAR FORM
function cancelarform() {
	limpiar();
	mostrarform(false);
}


//FUNCIÓN LISTAR USUARIO
function listar(){
    tabla=$('#tbllistado').dataTable({
        "aProcessing":true, //ACTIVAR EL PROCESAMIENTO DEL DATATABLE
        "aServerSide": true, //PAGINACIÓN Y FILTRADO REALIZADO POR EL SERVIDOR
        dom: 'Bfetip', //DEFINIR LOS PARAMETROS DEL CONTROL DE TABLA
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        //BOTONES PARA COPIAR LOS REGISTROS EN DIFERENTES FORMATOS
        buttons:[
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf',
        ],
        "ajax":{
            url: '../ajax/usuario.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e){
                console.log(e,responseText);
            }
        },
        "bDestroy":true,
        "iDisplayLength": 8, //PAGINACIÓN --> CADA 8 REGISTROS
        "order": [[0, "desc" ]] //ORDENAR (COLUMNA, ORDEN)
    }).DataTable();
}


//FUNCIÓN GUARDAR O EDITAR USUARIO
function guardaryeditar(e) {
	e.preventDefault(); //NO SE ACTIVA LA ACCIÓN PREDETERMINADA DEL EVENTO
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/usuario.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}


//FUNCIÓN MOSTRAR USUARIO
function mostrar(idusuario) {
	$.post("../ajax/usuario.php?op=mostrar",{idusuario : idusuario}, function(data, status)	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#username").val(data.username);
		$("#contrasenia").val(data.contrasenia);
		$("#email").val(data.email);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/usuarios/"+data.imagen);
		$("#imagenactual").val(data.imagen);
 		$("#idusuario").val(data.idusuario);
	});
	
	$.post("../ajax/usuario.php?op=permisos&id="+idusuario, function(r) {
		$("#permisos").html(r);
	});
}


//FUNCIÓN PARA DESACTIVAR USUARIO
function desactivar(idusuario) {
    alertify.confirm("Usuario","¿Estas seguro de desactivar al Usuario?", function() {
        $.post("../ajax/usuario.php?op=desactivar", {idusuario : idusuario}, function(e) {
            //alertify.alert(e);
            tabla.ajax.reload();
            alertify.success('Usuario desactivado');
        });
    },
    function(){
        alertify.error('Cancelado');
    });
}


//FUNCIÓN PARA ACTIVAR USUARIO
function activar(idusuario) {
    alertify.confirm("Usuario","¿Estas seguro de activar al Usuario?", function() {
        $.post("../ajax/usuario.php?op=activar", {idusuario : idusuario}, function(e) {
            //alertify.alert(e);
            tabla.ajax.reload();
            alertify.success('Usuario activado');
        });
    },
    function(){
        alertify.error('Cancelado');
    });
}

init();