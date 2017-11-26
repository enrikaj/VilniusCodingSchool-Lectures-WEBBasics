<?php
  session_start();
  require_once("../con.php");
  $conn = GetConnection();
  ValidateConnection($conn);

if(empty($_POST["username"])){
  $_SESSION["error"] = "Netinkamas vartotojo vardas ir/arba slaptažodis!";
  header('Location: ../../error.php');
}
if(empty($_POST["password"])){
  $_SESSION["error"] = "Netinkamas vartotojo vardas ir/arba slaptažodis!";
  header('Location: ../../error.php');
}

if($stmt = $conn->prepare("SELECT username, password FROM users WHERE username=?")){

  $stmt->bind_param("s", $username);

  $username = $_POST["username"];

  if($stmt->execute()){
    $stmt->bind_result($username, $password);

    $stmt->fetch();

    if(password_verify($_POST["password"], $password)){
      $_SESSION["username"] = $username;
      header('Location: ../../index.php');
    }
  }else{
    $_SESSION["error"] = "Netinkamas vartotojo vardas ir/arba slaptažodis!";
    header('Location: ../../error.php');
  }
}else{
  $_SESSION["error"] = "Problemos su kodu, ieškokite klaidos!";
  header('Location: ../../error.php');
}

 ?>
