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
        <i class="back-icon fa-sharp fa-solid fa-arrow-left fa-lg"></i>
        <h1 class="title">Event Application</h1>
        <i class="edit-icon fa-solid fa-pencil fa-lg"></i>
      </div>

      <form id="main-input-form" action="./apply-form.php" method="post">
        <ul class="form-container" id="questions-list">

          <!-- first standard question -->
          <li class="app-inputs" id="business-question">
            <div class="input-container">
              <label for="business-name">Business Name</label>
              <input id="business-name" type="text" class="app-question" name="business" ></input>
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
              <input id="contact-name" type="text" class="app-question" name="contact" ></input>
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
              <input id="email" type="text" class="app-question" name="email" ></input>
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
              <input id="phone-number" type="tel" class="app-question" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="XXX-XXX-XXXX" ></input>
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
             <input id="address" type="text" class="app-question" name="address" ></input>
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
             <input id="city" type="text" class="app-question" name="city" ></input>
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
             <input id="state" type="text" class="app-question" name="state" ></input>
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
             <input id="zip" type="text" class="app-question" name="zip" ></input>
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
             <input id="website" type="url" class="app-question" name="website"></input>
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
              <textarea id="event-details" class="inter" name="details"></textarea>
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
          <button class="submit-btn">Submit Application</button>
          <button class="add-question-btn hidden">Add Question</button>
          <button class="save-btn hidden" id="save-all-inputs">Save</button>
        </div>
      </form>
    </div>

    <!-- guard modal -->
    <div id="modal" class="guard-modal">
      <div class="guard-modal-content">
        <div class="header">
          <h2 class="guard-title">Edit Form for Event Organizers Only</h2>
        </div>
        <div>
          <div class="guard-btn-container">
            <button class="proceed-btn">Proceed</button>
            <button class="cancel-btn">Cancel</button>
          </div>
        </div>
      </div>
  </div>

    <!-- edit modal -->
    <div id="modal" class="edit-modal">
      <div class="edit-modal-content">
        <i class="x-icon fa-solid fa-x fa-lg"></i>
        <div class="header">
          <h2 class="title" id="new-input-title">Add Question</h2>
        </div>
        <div>
          <form id="new-input-form">
            <div class="new-input-container">
              <div>
                <label for="new-question" class="new-question-label">Input Label</label>
                <input id="new-question" type="text" class="new-question" required></input>
              </div>
            </div>
            <div class="new-input-container">
              <label for="new-input" class="new-input-label">Input Field Type</label>
              <select id="new-input" class="new-input inter">
                <option value="text">Text</option>
                <option value="number">Number</option>
                <option value="phone">Phone</option>
                <option value="email">Email</option>
                <option value="textarea">Text Area</option>
                <option value="select">Select</option>
                <option value="checkbox">Checkbox</option>
                <option value="radio">Radio</option>
              </select>
            </div>

            <div class="options-container hidden">
              <div class="options-header">
                <span>Options (Max 5)</span>
                <button class="add-input-btn">Add Input</button>
              </div>
              <ul id="option-list">

              </ul>
            </div>

            <div class="new-input-btn-container">
              <button class="save-btn" id="save-new-input">Save Input</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="./main.js"></script>
  </body>
</html>
