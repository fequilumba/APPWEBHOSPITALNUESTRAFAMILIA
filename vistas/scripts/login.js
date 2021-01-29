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
           /* bootbox.alert("Usuario y/o Password incorrectos");*/
            bootbox.alert({
                message: "This is an alert with additional classes!",
                className: 'rubberBand animated'
            });
        }
    });
})