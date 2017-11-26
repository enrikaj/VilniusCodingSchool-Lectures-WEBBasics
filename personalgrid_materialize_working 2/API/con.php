<?php
  function GetConnection(){
      $servername = "192.168.64.2";
      $username = "root";
      $password = "";
      $dbname = "PHP_Materialize_personal";

      //Sukuriamas objektas
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;

  }

    function ValidateConnection($conn){
      if($conn->connect_error){
        $_SESSION["error"] = "Prisijungimo prie duomenų bazės klaida!";
        header('Location: ../../error.php');
      }
    }
 ?>
