

$("#frmAcceso").on('submit',function(e)
{
	e.preventDefault();
    logina=$("#logina").val();
    clavea=$("#clavea").val();
    rol_idrol=$("#rol_idrol").val();

    $.post("../ajax/usuario.php?op=verificar",
        {"logina":logina,"clavea":clavea,"rol_idrol":rol_idrol},
        function(data)
    {
        if (data!="null")
        {
            
            $(location).attr("href","home.php");
               
        }
        else
        {
            Swal.fire('Usuario y/o Password incorrectos')
           //bootbox.alert("Usuario y/o Password incorrectos");
           //alert("Usuario y/o Password incorrectos");
           //$(location).attr("href","login.php");
        }
    });
})