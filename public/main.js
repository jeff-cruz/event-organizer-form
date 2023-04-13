// Main page:
  // Only 5 questions should be



// To do list:
// CLICK ICON: ON CLICK, REMOVE ALL QUESTIONS IN ".questions-list"
// SAVE BUTTON: ON CLICK, ADD QUESTIONS THAT HAVE A INPUT CHECKED TRUE, IF FALSE THEN ADD HIDDEN CLASS TO QUESTION


$(document).ready(function () {
  let inputIdCounter = 0;
  let optionIdCounter = 0;


  // clicking the save
  $("#save-all-inputs").click(function (event) {
    event.preventDefault();
    $(".title").text("Event Application");
    $(".edit-icon").removeClass("hidden"); // hide edit icon
    $(".submit-btn").removeClass("hidden"); // hide submit button
    $(".add-question-btn").addClass("hidden"); // show add question button
    $(".save-btn").addClass("hidden"); // show save button
    $(".checkbox-container").addClass("hidden"); // show checkboxes
    $(".trash-icon").hide();

    if ($("#business-checkbox:checked").val() !== "on") {
      $("#business-question").hide();
    }

    if ($("#email-checkbox:checked").val() !== "on") {
      $("#email-question").hide();
    }

    if ($("#phone-checkbox:checked").val() !== "on") {
      $("#phone-question").hide();
    }

    if ($("#contact-checkbox:checked").val() !== "on") {
      $("#contact-question").hide();
    }

    if ($("#details-checkbox:checked").val() !== "on") {
      $("#details-question").hide();
    }

  });

  // clicking the edit icon in the main form
  $(".edit-icon").click(function () {
    $(".title").text("Edit Event Application");
    $(".edit-icon").addClass("hidden"); // hide edit icon
    $(".submit-btn").addClass("hidden"); // hide submit button
    $(".add-question-btn").removeClass("hidden"); // show add question button
    $(".save-btn").removeClass("hidden"); // show save button
    $(".checkbox-container").removeClass("hidden"); // show checkboxes
    $(".app-question").removeClass("hidden"); // show all standard questions
    $("#business-question").show();
    $("#email-question").show();
    $("#phone-question").show();
    $("#contact-question").show();
    $("#details-question").show();
    $(".trash-icon").show();
  });

  // clicking the add question button in edit form
  $(".add-question-btn").click(function () {
    event.preventDefault();
    $(".modal").css("display", "block");
    $(".title").text("Add Question");
  });

  // clicking the X-icon in edit form
  $(".x-icon").click(function () {
    $(".modal").css("display", "none");
    $(".title").text("Edit Event Application");
  });

  // clicking the trash icon in edit form
  $("#questions-list").on("click", ".fa-trash", function() {
    let targetId = event.target.id;
    $('#'+targetId).remove();
  });

  // clicking save input button in add input form
  $("#save-new-input").click(function () {
    event.preventDefault();
    const newLabel = $("#new-question").val();
    const newInputType = $("#new-input").val();
    let newId = inputIdCounter++;

    if (newLabel !== undefined && newLabel !== '') {
      if(newInputType === 'text' | newInputType === 'number') {
        $('#questions-list').append(`
          <li class="app-inputs" id=${newId}>
            <div class="input-container">
              <label for='${newInputType}_${newId}'>${newLabel}</label>
              <input id='${newInputType}_${newId}' type=${newInputType} class="app-question" required></input>
            </div>
            <div class='checkbox-container'>
              <i class='fa fa-trash' aria-hidden='true' id=${newId}></i>
            </div>
          </li>`);
      }

      if(newInputType === 'textarea') {
        $('#questions-list').append(`
          <li class="app-inputs" id=${newId}>
            <div class="input-container">
              <label for='${newInputType}_${newId}'>${newLabel}</label>
              <textarea id='${newInputType}_${newId}' required></textarea>
            </div>
            <div class='checkbox-container'>
              <i class='fa fa-trash' aria-hidden='true' id=${newId}></i>
            </div>
          </li>`);
      }

    }

      $(".modal").css("display", "none");
      $('#new-input-form').trigger("reset");
  });

  // selecting an option that requires option inputs
  $("#new-input").change(function() {
    let newId = optionIdCounter++;

    if($("#new-input").val() === 'select') {
      $(".options-container").removeClass('hidden');
      $('#option-list').append(`
          <li class="app-inputs" id=${newId}>
            <div class="input-container">
              <input type='text' class="app-question" required></input>
            </div>
            <div class='checkbox-container'>
              <i class='fa fa-trash' aria-hidden='true' id=${newId}></i>
            </div>
          </li>`);
    }


  });

});
