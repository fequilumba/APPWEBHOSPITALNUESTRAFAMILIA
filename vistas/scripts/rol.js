$.post("../ajax/usuario.php?op=selectRol",function(r)
        {        
            //console.log(data);
            $("#rol").html(r);
            //$("#especialidad_idespecialidad").selectpicker('refresh');
            
        }
    );
