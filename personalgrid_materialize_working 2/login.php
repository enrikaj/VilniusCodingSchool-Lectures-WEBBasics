<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  </head>

  <body>

  <div class="container">
    <div class="row">
      <?php require_once("includes/menu.php") ?>
    </div>

    <div class="row">

      <form class="col s12" action="API/users/read.php" method="post">

      <div class="row">
        <div class="input-field col s12">
          <input id="username" name="username" type="text" class="validate">
          <label for="username">Vartotojo vardas</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" name="password" type="password" class="validate">
          <label for="password">Slaptažodis</label>
        </div>
      </div>

      <button class="btn waves-effect waves-light" type="submit" name="action">Submit
      </button>
    </form>
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

  <scricpt src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="js/materialize.js">
    </script>
    <script>
      $(".button-collapse").sideNav();
      $(".dropdown-button").dropdown();
    </script>

</body>


</html>
