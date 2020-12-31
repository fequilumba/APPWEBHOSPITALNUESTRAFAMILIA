var tabla
//ejecutar el inicio
function init() {
    mostrarform(false);
    listar();
    $("#formulario2").on("submit",function(e){
        guardaryeditar(e);
    });

    //Cargamos los items al select especialidad
    $.post("../ajax/medico.php?op=selectEspecialidad",function(r)
        {        
            //console.log(data);
            $("#idespecialidad").html(r);
            //$("#idespecialidad").selectpicker('refresh');
        }
    );
}
//funcion limpiar
function limpiar(){
    $("#idpersona").val("");
    $("#cedula").val("");
    $("#idespecialidad").val("");
    $("#nombres").val("");
    $("#apellidos").val("");
    $("#email").val("");
    $("#telefono").val("");
    $("#direccion").val("");
    $("#ciudad").val("");
    $("#fnacimiento").val("");
    $("#genero").val("");
}
//mostrar formulario
function mostrarform(flag){
    limpiar();
    if(flag){
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
    }else{
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
    }
}

//cancelar form
function cancelarform(){
    limpiar();
    mostrarform(false);
}
//funcion listar
function listar(){
    tabla=$('#tbllistado2').dataTable({
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
            url: '../ajax/medico.php?op=listar',
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
        $("#cedula").val(data.cedula)
        $("#tipoespecialidad").val(data.tipoespecialidad)
        $("#nombres").val(data.nombres)
        $("#apellidos").val(data.apellidos)
        $("#email").val(data.email)
        $("#telefono").val(data.telefono)
        $("#direccion").val(data.direccion)
        $("#ciudad").val(data.ciudad)
        $("#fnacimiento").val(data.fnacimiento);
        $("#genero").val(data.genero);
        $("#idpersona").val(data.idpersona);

    });
}
function eliminar(idpersona) {
    bootbox.confirm("Estas seguro que quieres ELIMINAR este registro" , function (result) { 
        if (result) {
            $.post("../ajax/persona.php?op=eliminar",{idpersona : idpersona}, function(e)
            {
                bootbox.alert(e);
                //tabla.ajax.reload();
            });
        }
     });
}

init();