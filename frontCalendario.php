<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset='utf-8' />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.0.1/main.css' rel='stylesheet' />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.0.1/main.min.js'></script>



  <style>
    /* body {
      margin: 40px 10px;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    } */

    #calendar {

      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
      max-width: 1000px;

      margin: 0 auto;
    }
  </style>
</head>

<body>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        // initialDate: '2020-06-12',
        editable: true,
        selectable: true,
        businessHours: true,
        dayMaxEvents: true, // allow "more" link when too many events

        events: 'backCalendario.php',
      });

      calendar.render();
    });
  </script>

  <div id='calendar'></div>




  
  <div class="informar-manutencao" style="margin: 40px,0,40px,0;">
  <h4 style="margin-top: 90px;">Programar Manutenção</h4>
    <form action="backSendEvents.php" method="post">

      <div class="row">
        <div class="col-8">
          <label>Descrição:</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Exemplo: CB-01 preventiva 500HRS" require>
        </div>

        <div class="col-2">
          <label>Defina uma cor:</label>
          <input type="color" list="presetColors" class="form-control" id="color" name="color" require>
        </div>
      </div>

      <div class="row" style="margin-top: 40px; margin-bottom: 40px">
        <div class="col-4">
          <label>Data Início:</label>
          <input type="datetime-local" id="start" name="start" require>
        </div>

        <label>Data Fim:</label>
        <div class="col-4">
          <input type="datetime-local" id="end" name="end" require>
        </div>
      </div>
    

      <div style="text-align: left; margin-top: 40px; margin-bottom: 40px">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>

    </form>
  </div>



  <!-- form de eventos -->



</body>

</html>