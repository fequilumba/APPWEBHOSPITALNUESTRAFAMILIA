
function init(){
  guardaryeditar()
}
function guardaryeditar() {
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
      },*/
      events:[

                {id: 1,
                title: 'evento',
                nombre: 'Juan',
                start: '2021-01-05',
                end: '2021-01-08'},
                {"idcita_medica":"1","persona_idpersona":"3","especialidad_idespecialidad":"1","start":"2021-01-17","diagnostico":"","sintomas":"","motivo_consulta":"","estado_idestado":"1","horario_idhorario":"1"}

        ],
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