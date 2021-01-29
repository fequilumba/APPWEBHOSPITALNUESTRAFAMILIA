/*$("#frmRegistro").on('submit',function(e)
{
	e.preventDefault();
    cedula=$("#cedula").val();
    nombres=$("#nombres").val();
    apellidos=$("#apellidos").val();
    telefono=$("#telefono").val();
    direccion=$("#direccion").val();
    ciudad_residencia=$("#ciudad_residencia").val();
    fecha_nacimiento=$("#fecha_nacimiento").val();
    genero=$("#genero").val();
    imagen=$("#imagen").val();

    $.post("../ajax/usuario.php?op=guardaryeditar",
        {"cedula":cedula,"nombres":nombres,"apellidos":apellidos,"telefono":telefono,"direccion":direccion,
        "ciudad_residencia":ciudad_residencia,"fecha_nacimiento":fecha_nacimiento,"genero":genero,"imagen":imagen},
        function(data)
    {
        if (data!="null")
        {
            $(location).attr("href","especialidad.php");            
        }
        else
        {
            bootbox.alert("No se pudo registrar el usuario");
        }
    });
    })*/

    function init() {
        $("#frmRegistro").on("submit",function(e){
            guardaryeditar(e);
        });
    }
    function limpiar(){
        $("#idusuario").val("");
        $("#cedula").val("");
        $("#nombres").val("");
        $("#apellidos").val("");
        $("#email").val("");
        $("#telefono").val("");
        $("#direccion").val("");
        $("#ciudad_residencia").val("");
        $("#fecha_nacimiento").val("");
        $("#genero").val("");
        $("#imagen").val("");
    }
    function guardaryeditar(e){
        e.preventDefault();
        //$("#btnGuardar").prop("disabled",true);
        var formData = new FormData($("#frmRegistro")[0]);
        $.ajax({
            url: "../ajax/usuario.php?op=guardaryeditar",
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
        bootbox.alert({
            message: "Usuario registrado",
            className: 'rubberBand animated'
        });
        $(location).attr("href","login.php");
    }

init();