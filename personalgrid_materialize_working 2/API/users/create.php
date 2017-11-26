<?php
session_start();

//-----------Prisijungimas------------
require_once("../con.php");
$conn = GetConnection();
ValidateConnection($conn);


  //--------Duomenu is formos patikrinimas--------------

if(!isset($_POST["name"])){
  echo "Klaida su name!";
}

if(!isset($_POST["surname"])){
  echo "Klaida su surname!";
}

if(!isset($_POST["username"])){
  echo "Klaida su username!";
  return;
}

if(!isset($_POST["email"])){
  echo "Klaida su email!";
}

if(!isset($_POST["birthday"])){
  echo "Klaida su birthday!";
}

if(!isset($_POST["password"])){
  echo "Klaida su password!";
}

//------Uzklausos formavimas ir paleidimas-------

if($stmt = $conn->prepare(
  "INSERT INTO users
      (name, surname, username, email, birthday, password, created, status)
      VALUES
      (?, ?, ?, ?, ?, ?, NOW(), 1)")
    )
{
$stmt->bind_param("ssssss",
  $name,
  $surname,
  $username,
  $email,
  $birthday,
  $hashed_password
);

  $name = $_POST["name"];
  $surname = $_POST["surname"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $birthday = $_POST["birthday"];
  $password = $_POST["password"];
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);


if($stmt->execute()){
  echo "Viskas ok!";
}
else{
  $_SESSION["error"] = "KLaida. Kreipkitės į tinklapio administratorių!";
  header('Location: ../../error.php');
  }

}
 ?>
