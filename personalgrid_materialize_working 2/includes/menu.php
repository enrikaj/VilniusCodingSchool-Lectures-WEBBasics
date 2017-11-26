<?php
  session_start();

  if(isset($_SESSION["username"])){
    require_once("menuregistered.php");
  }
  else{
    require_once("menunotregistered.php");
  }

 ?>
