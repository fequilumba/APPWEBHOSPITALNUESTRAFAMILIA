
$.post("../ajax/usuario.php?op=selectRol", function(r) {        
    //console.log(data);
    $("#rol_idrol").html(r);
    //$("#especialidad_idespecialidad").selectpicker('refresh');
});