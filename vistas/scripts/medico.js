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
            $("#especialidad_idespecialidad").selectpicker('refresh');
            
        }
    );
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
    $("#hora_inicio").val("");
    $("#hora_fin").val("");
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
    tabla=$('#tbllistado').dataTable({
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
        $("#especialidad_idespecialidad").val(data.especialidad_idespecialidad);
        //$('#especialidad_idespecialidad').selectpicker('refresh');
        $("#cedula").val(data.cedula)
        $("#nombres").val(data.nombres)
        $("#apellidos").val(data.apellidos)
        $("#email").val(data.email)
        $("#telefono").val(data.telefono)
        $("#direccion").val(data.direccion)
        $("#ciudad_residencia").val(data.ciudad_residencia)
        $("#fecha_nacimiento").val(data.fecha_nacimiento)
        $("#genero").val(data.genero)
        $("#idpersona").val(data.idpersona)

    });
}
//funcion para descativar especialidades
function desactivar(idpersona)
{
    bootbox.confirm("¿Estas seguro de desactivar al Médico?",function(result){
        if(result)
        {
            $.post(
                "../ajax/medico.php?op=desactivar", {idpersona : idpersona}, function(e)
                {
                    bootbox.alert(e);
                    tabla.ajax.reload();
        
                });
        }
    })
}

function activar(idpersona)
{
    bootbox.confirm("¿Estas seguro de activar al Médico?",function(result){
        if(result)
        {
            $.post(
                "../ajax/medico.php?op=activar",
                {idpersona:idpersona},
                function(e)
                {
                    bootbox.alert(e);
                    tabla.ajax.reload();
        
                }
            );
        }
    });
}

init();