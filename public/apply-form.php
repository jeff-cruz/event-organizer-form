<?php
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
  $dbname = "form_db";
  $username = "root";
  $password = "";

  $conn = mysqli_connect($host, $username, $password, $dbname);

  if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "INSERT INTO form (business, contact, email, phone, address, city, state, zip, website, details)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_stmt_init($conn);
  if (! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_connect_error($conn));
  }

  mysqli_stmt_bind_param($stmt, "sssssssiss",
                          $business,
                          $contact,
                          $email,
                          $phone,
                          $address,
                          $city,
                          $state,
                          $zip,
                          $website,
                          $details);

  mysqli_stmt_execute($stmt);

  echo "Data saved.";