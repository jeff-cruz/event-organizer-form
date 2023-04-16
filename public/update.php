<?php
  $id = $_POST["id"];
  $business = $_POST["business"];
  $contact = $_POST["contact"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $zip = $_POST["zip"];
  $website = $_POST["website"];
  $details = $_POST["details"];

  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "event_applications";

  $conn = mysqli_connect($host, $username, $password, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql =  "UPDATE applications SET business='$business', contact='$contact', email='$email', phone='$phone', address='$address', city='$city', state='$state', zip='$zip', website='$website', details='$details' WHERE id=$id";

  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }

  header('Location: applications.php');
?>
