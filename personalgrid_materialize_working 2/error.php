<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/materialize.css">
</head>
  <body>
    <div class="container">
      <div class="row">
        <?php
        //session_start();
        //$_SESSION["username"] = "Jonas";
        require_once("includes/menu.php") ?>
      </div>

      <div class="row">
      <?php
        //session_start();
        if(isset($_GET["error"])){
          echo "<h1>".$_GET["error"]."</h1>";
          //unset($_SESSION["error"]);
        }
        ?>
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
