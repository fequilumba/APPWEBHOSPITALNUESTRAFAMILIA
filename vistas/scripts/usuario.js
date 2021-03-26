var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
    })
    
}

//Función limpiar
function limpiar()
{
	$("#username").val("");
	$("#contrasenia").val("");
	$("#email").val("");
    $("#imagenmuestra").attr("src","");
    $("#imagenactual").val("");
	$("#idusuario").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
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
            url: '../ajax/usuario.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e){
                console.log(e,responseText);
            }
        },
        "bDestroy":true,
        "iDisplayLength": 8, //paginacion--> cada 5 registros
        "order": [[0, "desc" ]]//ordenar (columna)
    }).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
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

function mostrar(idusuario)
{
	$.post("../ajax/usuario.php?op=mostrar",{idusuario : idusuario}, function(data, status)
	{
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
	 $.post("../ajax/usuario.php?op=permisos&id="+idusuario,function(r){
		$("#permisos").html(r);
	});
}

//Función para desactivar registros
function desactivar(idusuario)
{
    alertify.confirm("Usuario","¿Estas seguro de desactivar al Usuario?",
        function(){
            $.post(
                "../ajax/usuario.php?op=desactivar", {idusuario : idusuario}, function(e)
                {
                    //alertify.alert(e);
                    tabla.ajax.reload();
                    alertify.success('Usuario desactivado');
        
                });
        },
        function(){
            alertify.error('Cancelado');
        });
}

//Función para activar registros
function activar(idusuario)
{
    alertify.confirm("Usuario","¿Estas seguro de activar al Usuario?",
        function(){
            $.post(
                "../ajax/usuario.php?op=activar", {idusuario : idusuario}, function(e)
                {
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