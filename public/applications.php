<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Applications</title>
    <script src="https://kit.fontawesome.com/5b4baab3e6.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles.css">
  </head>
  <body>
    <div class="applications-container">
      <div class="header">
        <i class="back-icon fa-sharp fa-solid fa-arrow-left fa-lg"></i>
        <h1 class="title">Applications</h1>
      </div>
      <div class='table-container'>
        <table class='table'>
          <thead>
            <tr>
              <th>Business</th>
              <th>Contact</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>City</th>
              <th>State</th>
              <th>Zip</th>
              <th>Website</th>
              <th>Event Details</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $host = "localhost";
              $username = "root";
              $password = "";
              $dbname = "event_applications";

              $conn = mysqli_connect($host, $username, $password, $dbname);
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT * FROM applications";
              $data = $conn->query($sql);
              if(!$data) {
                die("Unable to retrieve data:" . $conn->error);
              }

              while($row = $data->fetch_assoc()) {
                echo "
                  <tr>
                    <td>$row[business]</td>
                    <td>$row[contact]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[city]</td>
                    <td>$row[state]</td>
                    <td>$row[zip]</td>
                    <td>$row[website]</td>
                    <td>$row[details]</td>
                    <td>
                      <a class='table-link' href='./edit.php?id=$row[id]'>Edit</a>
                      <a class='table-link' href='./delete.php?id=$row[id]'>Delete</a>
                    </td>
                  </tr>
                ";
              }
            ?>

          </tbody>
        </table>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="./main.js"></script>
  </body>
</html>
