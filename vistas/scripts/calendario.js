
function init(){
  guardaryeditar()
  //Cargamos los items al select Especialidad
  $.post("../ajax/cita.php?op=selectEspecialidad",function(r)
        {        
            //console.log(data);
            $("#especialidad").html(r);
            //$("#especialidad_idespecialidad").selectpicker('refresh');
            
        }
    );
    $.post("../ajax/cita.php?op=selectPaciente",function(r)
        {        
            //console.log(data);
            $("#paciente").html(r);
            //$("#especialidad_idespecialidad").selectpicker('refresh');
            
        }
    );
    $.post("../ajax/cita.php?op=selectHorario",function(r)
        {        
            //console.log(data);
            $("#hora").html(r);
            //$("#especialidad_idespecialidad").selectpicker('refresh');
            
        }
    );       
}

function guardaryeditar() {
  var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'es',
      navLinks: true,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      
      dateClick: function(info) {
        /*alert('Clicked on: ' + info.dateStr);
        alert('Current view: ' + info.view.type);
        $("#titulo").html(info.dateStr);
        // change the day's background color just for fun
        info.dayEl.style.backgroundColor = 'red';*/
        $("#fecha").val(info.dateStr);
        $("#flipFlop").modal();
      },
      events:[{"title":"2","persona_idpersona":"2","especialidad_idespecialidad":"1","start":"2021-01-20","motivo_consulta":"","estado_idestado":"1","horario_idhorario":"2"}],
      eventClick: function(events){
        $("#titulo").html(events.title);
        $("#flipFlop").modal();
      }
      
    });

    calendar.render();
  }


/*  document.addEventListener('DOMContentLoaded', function() {
    
  var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      navLinks: true,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      
      /*dateClick: function(info) {
        alert('Clicked on: ' + info.dateStr);
        alert('Current view: ' + info.view.type);
        $("#titulo").html(info.dateStr);
        // change the day's background color just for fun
        info.dayEl.style.backgroundColor = 'red';
        $("#flipFlop").modal();
      },
      events:[
        {
          title  : 'event1',
          start  : '2021-01-01'
        },
        {
          title  : 'event2',
          start  : '2021-01-01',
          end    : '2021-01-07'
        },
        {
          title  : 'event3',
          start  : '2021-01-17T19:30:00',
          allDay : false // will make the time show
        }
      ],
      eventClick: function(events){
        $("#titulo").html(events.title);
        $("#flipFlop").modal();
      }
      
    });

    calendar.render();
  });*/

init();