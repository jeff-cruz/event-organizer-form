<?php
  if(isset($_GET["id"])) {
    $id = $_GET["id"];

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "event_applications";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    $sql = "DELETE FROM applications WHERE id=$id";
    $conn->query($sql);
  }
  header("location: applications.php");
  exit;
?>
