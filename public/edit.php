<?php
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "event_applications";

  $conn = mysqli_connect($host, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if($_SERVER['REQUEST_METHOD'] == "GET") {
    if(!isset($_GET["id"]) ) {
        header("location: ../index.php");
        exit;
      }

      $id = $_GET["id"];
      $sql = "SELECT * FROM applications WHERE id=$id";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

      if(!$row) {
        header("location: ../index.php");
        exit;
      }
      $business = $row["business"];
      $contact = $row["contact"];
      $email = $row["email"];
      $phone = $row["phone"];
      $address = $row["address"];
      $city = $row["city"];
      $state = $row["state"];
      $zip = $row["zip"];
      $website = $row["website"];
      $details = $row["details"];
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Organizer Application</title>
    <script src="https://kit.fontawesome.com/5b4baab3e6.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles.css">
  </head>
  <body>
    <div class="container">
      <div class="header">
        <i class="back-to-application-btn fa-sharp fa-solid fa-arrow-left fa-lg"></i>
        <h1 class="title">Edit Event Application</h1>
      </div>

      <form id="edit-input-form" action="./update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <ul class="form-container" id="questions-list">
          <!-- first standard question -->
          <li class="app-inputs" id="business-question">
            <div class="input-container">
              <label for="business-name">Business Name</label>
              <input id="business-name" type="text" class="app-question" name="business" value="<?php echo $business; ?>"></input>
            </div>
            <div class="checkbox-container hidden">
              <label for="business-checkbox">
              <input id="business-checkbox" class="input-checkbox" type="checkbox" checked="checked"> </input>
              </label>
            </div>
          </li>

           <!-- second standard question -->
          <li class="app-inputs" id="contact-question">
            <div class="input-container">
              <label for="contact-name">Contact Name</label>
              <input id="contact-name" type="text" class="app-question" name="contact" value="<?php echo $contact; ?>"></input>
            </div>
            <div class="checkbox-container hidden">
              <label for="contact-checkbox">
              <input id="contact-checkbox" class="input-checkbox" type="checkbox" checked="checked"> </input>
              </label>
            </div>
          </li>

          <!-- third standard question -->
          <li class="app-inputs" id="email-question">
            <div class="input-container">
              <label for="email">Email Address</label>
              <input id="email" type="text" class="app-question" name="email" value="<?php echo $email; ?>"></input>
            </div>
            <div class="checkbox-container hidden">
              <label for="email-checkbox">
              <input id="email-checkbox" class="input-checkbox" type="checkbox" checked="checked"> </input>
              </label>
            </div>
          </li>

          <!-- fourth standard question -->
          <li class="app-inputs" id="phone-question">
            <div class="input-container">
              <label for="phone-number">Phone Number</label>
              <input id="phone-number" type="tel" class="app-question" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="XXX-XXX-XXXX" value="<?php echo $phone; ?>"></input>
            </div>
            <div class="checkbox-container hidden">
              <label for="phone-checkbox">
                <input id="phone-checkbox" class="input-checkbox" type="checkbox" checked="checked"> </input>
              </label>
            </div>
          </li>

          <!-- fifth standard question -->
          <li class="app-inputs" id="address-question">
            <div class="input-container">
              <label for="address">Address</label>
             <input id="address" type="text" class="app-question" name="address" value="<?php echo $address; ?>"></input>
            </div>
            <div class="checkbox-container hidden">
              <label for="address-checkbox">
                <input id="address-checkbox" class="input-checkbox" type="checkbox" checked="checked"> </input>
              </label>
            </div>
          </li>

          <!-- sixth standard question -->
          <li class="app-inputs" id="city-question">
            <div class="input-container">
              <label for="city">City</label>
             <input id="city" type="text" class="app-question" name="city" value="<?php echo $city; ?>"></input>
            </div>
            <div class="checkbox-container hidden">
              <label for="city-checkbox">
                <input id="city-checkbox" class="input-checkbox" type="checkbox" checked="checked"> </input>
              </label>
            </div>
          </li>

          <!-- seventh standard question -->
          <li class="app-inputs" id="state-question">
            <div class="input-container">
              <label for="state">State</label>
             <input id="state" type="text" class="app-question" name="state" value="<?php echo $state; ?>"></input>
            </div>
            <div class="checkbox-container hidden">
              <label for="state-checkbox">
                <input id="state-checkbox" class="input-checkbox" type="checkbox" checked="checked"> </input>
              </label>
            </div>
          </li>

          <!-- eigth standard question -->
          <li class="app-inputs" id="zip-question">
            <div class="input-container">
              <label for="zip">Zip Code</label>
             <input id="zip" type="text" class="app-question" name="zip" value="<?php echo $zip; ?>"></input>
            </div>
            <div class="checkbox-container hidden">
              <label for="zip-checkbox">
                <input id="zip-checkbox" class="input-checkbox" type="checkbox" checked="checked"> </input>
              </label>
            </div>
          </li>

          <!-- ninth standard question -->
          <li class="app-inputs" id="website-question">
            <div class="input-container">
              <label for="website">Website (Optional)</label>
             <input id="website" type="url" class="app-question" name="website" value="<?php echo $website; ?>"></input>
            </div>
            <div class="checkbox-container hidden">
              <label for="website-checkbox">
                <input id="website-checkbox" class="input-checkbox" type="checkbox" checked="checked"> </input>
              </label>
            </div>
          </li>

          <!-- tenth standard question -->
          <li class="app-inputs" id="details-question">
            <div class="input-container">
              <label for="event-details">Event Details (Optional)</label>
              <input type="text" id="event-details" class="app-question" name="details" value="<?php echo $details; ?>"></textarea>
            </div>
            <div class="checkbox-container hidden">
              <label for="details-checkbox">
                <input id="details-checkbox" class="input-checkbox" type="checkbox" checked="checked"> </input>
              </label>
            </div>
          </li>

        </ul>

        <!-- FORM BUTTONS -->
        <div class="btn-container">
          <button class="submit-btn" id="save-edit-btn">Save Edit</button>
        </div>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="./main.js"></script>
  </body>
</html>
