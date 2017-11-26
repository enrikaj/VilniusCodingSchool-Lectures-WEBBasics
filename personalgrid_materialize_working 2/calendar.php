<?php
  ini_set('session.gc_maxlifetime', 10);
  session_set_cookie_params(10);
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/calendar.css">
  </head>

  <body>
    <div class="container">
      <div class="row">
      <?php
      require_once("includes/menu.php")
      ?>

    <div class="row">
      <form class="" id="form" action="API/Calendar/create.php" method="post">
        <div class="input-field col s6">
          <input id="event" name="event" type="text" class="validate">
          <label for="event">Įvykis</label>
        </div>
        <div class="input-field col s6">
          <input id="eventdate" name="eventdate" type="text" class="datepicker">
          <label for="eventdate">Data</label>
        </div>
        <button class="btn waves-effect waves-light" id ="submit" type="submit" name="action">Submit
        </button>
        <span class=response></span>
      </form>
    </div>

    <div class="row">
      <div class="col s12">
        <div id="calendar">
          <div class="dayDetails">

          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <footer class="page-footer">
        <div class="footer-copyright">
          <div class="container">
            © 2017 Copyright Mano svetainė
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="js/jquery.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/calendar.js"></script>
  <script>
      $(".button-collapse").sideNav();
      initCalendar();

      $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Šiandien',
        clear: 'Išvalyti',
        close: 'Gerai',
        monthsFull: [ 'Sausis', 'Vasaris', 'Kovas', 'Balandis', 'Gegužė', 'Birželis', 'Liepa', 'Rugpjūtis', 'Rugsėjis', 'Spalis', 'Lapkritis', 'Gruodis' ],
        monthsShort: [ 'Sau', 'Vas', 'Kov', 'Bal', 'Geg', 'Bir', 'Lie', 'Rgp', 'Rgs', 'Spa', 'Lap', 'Gru' ],
        weekdaysFull: [ 'Sekmadienis', 'Pirmadienis', 'Antradienis', 'Trečiadienis', 'Ketvirtadienis', 'Penktadienis', 'Šeštadienis'],
        weekdaysShort: [ 'Sek', 'Pir', 'Ant', 'Tre', 'Ket', 'Pen', 'Šeš'],
        weekdaysLetter: ['S', 'P', 'A', 'T', 'K', 'Pn', 'Š'],
        closeOnSelect: false, // Close upon selecting a date,
        format: 'yyyy-mm-dd',
        firstDay: 1
      });

        $("#submit").on("click", function(event){
          event.preventDefault();
          $.ajax({
            type: "POST",
            url: "API/Calendar/create.php",
            data: $("#form").serialize(),
            dataType: "json",
            encode: true
          })
          .done(function(data){
            if (data.errorMessage === undefined) {
              $(".response").text(data.status);
            } else {
              $(".response").text(data.errorMessage);
            }
          })
          .fail(function(response, ajaxOptions, thrownException){
            console.log(response.status);
            console.log(ajaxOptions);
            console.log(thrownException);
          });
        });

    </script>
</body>
</html>
