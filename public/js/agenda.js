
// function : significa que cuando se cargue todo el contenido se ejecutara este script
document.addEventListener('DOMContentLoaded', function() {

    let formulario = document.querySelector("#form");
    //agenda es el nombre de un ID que se encuentra en nuesta vista agenda/index
    // busca un div con id agenda para convertirlo en una calendar
    var calendarEl = document.getElementById('agenda');
    //Para ponerle opciones al calendario
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale:"es",

      headerToolbar: {
          left: 'prev, next, today',
          center: 'title',
          right: 'dayGridMonth, timeGridWeek, listWeek'
      }
    });


    // Mostrar el calendario
    calendar.render();

    document.getElementById("btnSave").addEventListener("click",function() {
      const datos = new FormData(formulario);
      console.log(datos);
      console.log(formulario.name.value);
      console.log(formulario.description.value);
      console.log(formulario.color.value);
      axios.post();
    });

    
  });