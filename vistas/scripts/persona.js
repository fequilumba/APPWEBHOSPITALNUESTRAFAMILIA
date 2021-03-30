var tabla;

//FUNCIÓN QUE SE EJECUTA AL INICIO
function init() {
    mostrarform(false);

    listar();
    $("#formulario").on("submit",function(e){
        guardaryeditar(e);
    });

    // MOSTRAR ROLES
	$.post("../ajax/persona.php?op=roles&id=",function(r){
		$("#roles").html(r);
	});
}

// FUNCIÓN LIMPIAR
function limpiar() {
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
    $("#administrador").val("");
    $("#cliente").val("");
    $('#cedula').css("background-color", "#FFFFFF");
}

// FUNCIÓN MOSTRAR FORMULARIO
function mostrarform(flag) {  // LA VARIABLE FLAG SI RECIBE TRUE MUESTRA FORMULARIO Y OCULTAR EL LISTADO Y SI RECIBE UN FALSE OCULTA EL FORMULARIO Y MOSTRAR EL LISTADO
    limpiar();
    if(flag){
        $("#listadoregistros").hide(); // EL LISTADO REGISTROS ESTARA OCULTO (HIDE)
        $("#formularioregistros").show(); // EL FORMULARIO VA ESTAR VISIBLE (SHOW) 
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
    } else {
        $("#listadoregistros").show(); // EL LISTADO VA ESTAR VISIBLE (SHOW)
        $("#formularioregistros").hide(); // EL FORMULARIO ESTARA OCULTO (HIDE)
        $("#btnagregar").show();
    }
}

// FUNCIÓN CARCELAR FORM
function cancelarform(){
    limpiar();
    mostrarform(false);
}

//FUNCIÓN LISTAR
function listar() {
    tabla=$('#tbllistado').dataTable({
        "aProcessing":true, //ACTIVAR EL PROCESAMIENTO DEL DATATABLE
        "aServerSide": true, //PAGINACIÓN Y FILTRADO REALIZADO POR EL SERVIDOR
        dom: 'Bfetip', // DEFINIR LOS PARAMETROS DEL CONTROL DE TABLA
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        // BOTONES PARA COPIAR LOS REGISTROS EN DIFERENTES FORMATOS
        buttons:[
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf',
        ],

        "ajax": {
            url: '../ajax/persona.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e){
                console.log(e,responseText);
            }
        },
        "bDestroy":true,
        "iDisplayLength": 5, // PAGINACIÓN --> CADA 5 REGISTROS
        "order": [[0, "desc" ]] // ORDENAR (COLUMNA, ORDEN)
    }).DataTable();
}

// FUNCIÓN GUARDAR O EDITAR
function guardaryeditar(e){
    e.preventDefault(); // NO SE ACTIVA LA ACCIÓN PREDETERMINADA DEL EVENTO
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/persona.php?op=guardaryeditar",
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

// FUNCIÓN MOSTRAR PERSONA
function mostrar(idpersona){
    $.post("../ajax/persona.php?op=mostrar",{idpersona : idpersona}, function(data, status)
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
        $("#idpersona").val(data.idpersona);

    });
    $.post("../ajax/persona.php?op=roles&id="+idpersona,function(r){
		$("#roles").html(r);
	});
}

// FUNCIÓN PARA DESACTIVAR CLIENTE
function desactivar(idpersona)
{
    alertify.confirm("Cliente","¿Estas seguro de desactivar al Cliente?", function() {
        $.post("../ajax/persona.php?op=desactivar", {idpersona : idpersona}, function(e) {
            //alertify.alert(e);
            tabla.ajax.reload();
            alertify.success('Cliente desactivado');
            });
        },
        function(){
            alertify.error('Cancelado');
        });
}

// FUNCIÓN PARA ACTIVAR CLIENTE
function activar(idpersona)
{
    alertify.confirm("Cliente","¿Estas seguro de activar al Cliente?",
        function(){
            $.post(
                "../ajax/persona.php?op=activar", {idpersona : idpersona}, function(e)
                {
                    //alertify.alert(e);
                    tabla.ajax.reload();
                    alertify.success('Cliente activado');
        
                });
        },
        function(){
            alertify.error('Cancelado');
        });
}

init();