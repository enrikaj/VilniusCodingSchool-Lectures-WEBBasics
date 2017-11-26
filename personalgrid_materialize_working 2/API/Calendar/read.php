<?php
//---Prisijungimas----
require_once("../con.php");
$conn = GetConnection();
ValidateConnection($conn);

if($stmt = $conn->prepare("SELECT name, eventdate FROM events")){
  if($stmt->execute()){
    $stmt->bind_result($event, $eventdate);

    //-----paimame visus rezultatus-----
    $result = $stmt->get_result();

    $resultToReturn = array();

    while ($row = $result->fetch_assoc()) {
      $event = new stdClass();
      $event->event = $row["name"];
      $event->eventdate = $row["eventdate"];
      array_push($resultToReturn, $event);
    }

    $eventsJSON = json_encode($resultToReturn);

    echo $eventsJSON;
  }
} else {
  $event = new stdClass();
  $event->error = $conn->error;
  echo json_encode($event);
}

 ?>
