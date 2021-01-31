function init() {
  calendario()
  $("#formCitas").on("submit",function(e){
    guardaryeditar(e);
    location.reload();

  });
  //Cargamos los items al select Especialidad
  $.post("../ajax/calendario.php?op=selectEspecialidad",function(r)
  {        
      //console.log(data);
      $("#especialidad_idespecialidad").html(r);
      $("#especialidad_idespecialidad").selectpicker('refresh');
      
  });
  $.post("../ajax/calendario.php?op=selectPaciente",function(r)
  {        
      //console.log(data);
      $("#personaPaciente_idpersona").html(r);
      $("#personaPaciente_idpersona").selectpicker('refresh');
      
  });
  $("#especialidad_idespecialidad").change(function(){
      $("#especialidad_idespecialidad option:selected").each(function(){
        idespecialidad= $(this).val();
        $.post("../ajax/calendario.php?op=selectMedico",{idespecialidad:idespecialidad},function(r){         
          $("#personaMedico_idpersona").html(r);
          //$("#personaMedico_idpersona").selectpicker('refresh');
        });
      });
  });

  $.post("../ajax/calendario.php?op=selectHorario",function(r)
  {        
      //console.log(data);
      $("#horario_idhorario").html(r);
      //$("#especialidad_idespecialidad").selectpicker('refresh');
      
  }); 
  $("#btnCancelar").click(function(event) {
    //$("#formCitas")[0].reset();
    //limpiar();
    $('#formCitas :input').not("[type=radio],[type=checkbox],[type=hidden],[readonly='readonly'],[style*='display: none'],.select2-offscreen,[class^='select2'],select").each(function(){
      var name = $(this).attr('name');
      console.log(name);
      $(this).val('');
  });
  });     

}//fin init

//funcion limpiar
function limpiar(){
  $("#idcita_medica").val("");
  $("#especialidad_idespecialidad").val("");
  $("#personaPaciente_idpersona").val("");
  $("#personaMedico_idpersona").val("");
  $("#fecha_cita").val("");
  $("#motivo_consulta").val("");
  $("#horario_idhorario").val("");
}

function calendario() { 

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'es',
      navLinks: true,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      events: '../ajax/calendario.php?op=listarCitas'
      ,
  
     /* eventClick:'../ajax/cita.php?op=mostrarCita', function (data,events) {
        data = JSON.parse(data);
          $("#especialidad_idespecialidad").val(data.especialidad_idespecialidad);
          $("#persona_idpersona").val(data.persona_idpersona);
          $("#fecha_cita").val(data.start);
          $("#motivo_consulta").val(data.motivo_consulta);
          $("#horario_idhorario").val(data.horario_idhorario);
          $("#idcita_medica").val(events.id);
      }
      function mostrar(idcita_medica){
        $.post("../ajax/especialidad.php?op=mostrar",{idcita_medica : idcita_medica}, function(data, status)
        {
            data = JSON.parse(data);
            $("#modalCitas").modal();
            $("#especialidad_idespecialidad").val(data.especialidad_idespecialidad);
            $("#persona_idpersona").val(data.persona_idpersona);
            $("#fecha_cita").val(data.start);
            $("#motivo_consulta").val(data.motivo_consulta);
            $("#horario_idhorario").val(data.horario_idhorario);
            $("#idcita_medica").val(data.idcita_medica);  
    
        });
    },*/
      dateClick: function(info) {
        var actual = new Date();
        if(info.date >= actual){
        $("#fecha_cita").val(info.dateStr);   
        $("#modalCitas").modal();
        //document.getElementById("dia").innerHTML= info.dateStr;
        }else{
          bootbox.alert({
            message: "No se puede agendar citas en una fecha vencida"
            });
        }
      },
      hiddenDays: [0,6]
    });//fin eventListener
    calendar.render();
  });
 }//fin funcion calendario



function guardaryeditar(e){
  e.preventDefault(); //no se activa la accion predeterminada del evento
  
  var formData = new FormData($("#formCitas")[0]);
  $.ajax({
      url: "../ajax/calendario.php?op=guardarCita",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,

  });
  alertify.success('Cita registrada');
  $("#modalCitas").modal('toggle');
}

init();