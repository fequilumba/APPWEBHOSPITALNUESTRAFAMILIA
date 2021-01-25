function init() {
  calendario()
  $("#formCitas").on("submit",function(e){
    guardaryeditar(e);
    location.reload();

  });
  //Cargamos los items al select Especialidad
  $.post("../ajax/cita.php?op=selectEspecialidad",function(r)
  {        
      //console.log(data);
      $("#especialidad_idespecialidad").html(r);
      //$("#especialidad_idespecialidad").selectpicker('refresh');
      
  });
  $.post("../ajax/cita.php?op=selectPaciente",function(r)
  {        
      //console.log(data);
      $("#persona_idpersona").html(r);
      $("#persona_idpersona").selectpicker('refresh');
      
  });
  $.post("../ajax/cita.php?op=selectHorario",function(r)
  {        
      //console.log(data);
      $("#horario_idhorario").html(r);
      //$("#especialidad_idespecialidad").selectpicker('refresh');
      
  });       
  
  /*$('btnAgregar').click(function(){
      var nuevaCita={
        title:$('#paciente').val(),
        start:$('#fecha').val()
      };
  
  });*/

}//fin init


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
      events: '../ajax/cita.php?op=listarCitas'
      ,
  
      eventClick: /*'../ajax/cita.php?op=mostrarCita', function (data,events) {
        data = JSON.parse(data);
          $("#especialidad_idespecialidad").val(data.especialidad_idespecialidad);
          $("#persona_idpersona").val(data.persona_idpersona);
          $("#fecha_cita").val(data.start);
          $("#motivo_consulta").val(data.motivo_consulta);
          $("#horario_idhorario").val(data.horario_idhorario);
          $("#idcita_medica").val(events.id);
      }*/
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
    },
      dateClick: function(info, jsEvent,view) {
        //$("#fecha").val(info.dateStr);
        /*$("#modalCitas").modal();*/
        $("#fecha_cita").val(info.dateStr);   
        $("#modalCitas").modal();
        /*calendar.addEvent({
          title:"prueba",
          date:info.dateStr
        });  */ 
      },
      editable: true,
      eventDrop: function(info) {
        $("#fecha_cita").val(info.dateStr);
        "../ajax/cita.php?op=guardarCita"
      }
      
    });//fin eventListener
    calendar.render();
  });
 }//fin funcion calendario



function guardaryeditar(e){
  e.preventDefault(); //no se activa la accion predeterminada del evento
  
  var formData = new FormData($("#formCitas")[0]);
  $.ajax({
      url: "../ajax/cita.php?op=guardarCita",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,

      /*success: function(datos){      
          bootbox.alert(datos);
      }*/

  });


  //fullCalendar('refetchEvents').FullCalendar;
  //FullCalendar('refresh');
  //$("#calendar").fullCalendar('rerenderEvents');
  alertify.success('Cita registrada');
  $("#modalCitas").modal('toggle');
}

init();