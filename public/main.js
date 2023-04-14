$(document).ready(function () {
  let inputIdCounter = 0;
  let optionIdCounter = 0;

  // main form page
  $("#save-all-inputs").click(function (event) {
    event.preventDefault();

    $(".title").text("Event Application");
    $(".edit-icon").removeClass("hidden");
    $(".submit-btn").removeClass("hidden");
    $(".add-question-btn").addClass("hidden");
    $(".save-btn").addClass("hidden");
    $(".checkbox-container").addClass("hidden");
    $(".trash-icon").hide();

    // hide any standard questions toggled off
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
    if ($("#address-checkbox:checked").val() !== "on") {
      $("#address-question").hide();
    }
    if ($("#city-checkbox:checked").val() !== "on") {
      $("#city-question").hide();
    }
    if ($("#state-checkbox:checked").val() !== "on") {
      $("#state-question").hide();
    }
    if ($("#zip-checkbox:checked").val() !== "on") {
      $("#zip-question").hide();
    }
    if ($("#details-checkbox:checked").val() !== "on") {
      $("#details-question").hide();
    }
  });

  // edit form page
  $(".edit-icon").click(function () {
    $(".title").text("Edit Event Application"); // edit form title
    $(".edit-icon").addClass("hidden"); // hide edit icon
    $(".submit-btn").addClass("hidden"); // hide submit button
    $(".add-question-btn").removeClass("hidden"); // show add question button
    $(".save-btn").removeClass("hidden"); // show save button
    $(".checkbox-container").removeClass("hidden"); // show checkboxes
    $(".app-question").removeClass("hidden"); // show all standard questions

    // reveal all standard questions in edit-form
    $("#business-question").show();
    $("#email-question").show();
    $("#phone-question").show();
    $("#contact-question").show();
    $("#address-question").show();
    $("#city-question").show();
    $("#state-question").show();
    $("#zip-question").show();
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
    $("#new-input-form").trigger("reset");
    $(".modal").css("display", "none");
    $(".title").text("Edit Event Application");
    $("#option-list").empty();
    $(".options-container").addClass("hidden");
  });

  // clicking the trash icon in edit form
  $("#questions-list").on("click", ".fa-trash", function () {
    let targetId = event.target.id;
    $("#" + targetId).remove();
  });

  // clicking the trash icon in edit form
  $("#option-list").on("click", ".fa-trash", function () {
    if($("#option-list li").length > 1) {
      let targetId = event.target.id;
      $("#" + targetId).remove();
    }
  });

  // clicking save input button in add input form
  $("#save-new-input").click(function () {
    event.preventDefault();
    const newLabel = $("#new-question").val();
    const newInputType = $("#new-input").val();
    let newId = inputIdCounter++;

    if (newLabel !== undefined && newLabel !== "") {
      if (
        newInputType === "text" ||
        newInputType === "number" ||
        newInputType === "email"
      ) {
        $("#questions-list").append(`
          <li class="app-inputs" id=${newId}>
            <div class="input-container">
              <label for='${newInputType}_${newId}'>${newLabel}</label>
              <input id='${newInputType}_${newId}' type=${newInputType} class="app-question" required></input>
            </div>
            <div class='checkbox-container'>
              <i class='fa fa-trash edit-input-trash-btn' aria-hidden='true' id=${newId}></i>
            </div>
          </li>`);
      }

      if(newInputType === "phone") {
        $("#questions-list").append(`
          <li class="app-inputs" id=${newId}>
            <div class="input-container">
              <label for='${newInputType}_${newId}'>${newLabel}</label>
              <input id='${newInputType}_${newId}' type=${newInputType} class="app-question" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="XXX-XXX-XXXX" required></input>
            </div>
            <div class='checkbox-container'>
              <i class='fa fa-trash edit-input-trash-btn' aria-hidden='true' id=${newId}></i>
            </div>
          </li>`);
      }

      if (newInputType === "textarea") {
        $("#questions-list").append(`
          <li class="app-inputs" id=${newId}>
            <div class="input-container">
              <label for='${newInputType}_${newId}'>${newLabel}</label>
              <textarea id='${newInputType}_${newId}' required></textarea>
            </div>
            <div class='checkbox-container'>
              <i class='fa fa-trash edit-input-trash-btn' aria-hidden='true' id=${newId}></i>
            </div>
          </li>`);
      }

      if (newInputType === "select") {
        let options = [];
        let inputsArray = $("#new-input-form").serialize().split("&");

        for(let i = 0; i < inputsArray.length; i++) {
          options.push(inputsArray[i].slice(inputsArray[i].lastIndexOf('=') + 1));
        }

        $("#questions-list").append(`
          <li class="app-inputs" id=${newId}>
            <div class="input-container">
              <label for='${newInputType}_${newId}'>${newLabel}</label>
              <select id='${newInputType}_${newId}' class='select-dropdown' required></select>
            </div>
            <div class='checkbox-container'>
              <i class='fa fa-trash edit-input-trash-btn' aria-hidden='true' id=${newId}></i>
            </div>
          </li>`);

        for(let k = 0; k < options.length; k++) {
          $("#" + `${newInputType}_${newId}`).append(`
            <option value='${options[k].toLowerCase()}'>${options[k]}</option>
          `);
        }
      }
    }

    if (newInputType === "checkbox") {
        let options = [];
        let inputsArray = $("#new-input-form").serialize().split("&");

        for(let i = 0; i < inputsArray.length; i++) {
          options.push(inputsArray[i].slice(inputsArray[i].lastIndexOf('=') + 1));
        }

        $("#questions-list").append(`
          <li class="app-inputs" id=${newId}>
            <div class="input-container">
              <fieldset id='${newInputType}_${newId}'>
                <legend>${newLabel}</legend>
              </fieldset>
            </div>
            <div class='checkbox-container'>
              <i class='fa fa-trash edit-input-trash-btn' aria-hidden='true' id=${newId}></i>
            </div>
          </li>`);

        for(let k = 0; k < options.length; k++) {
          $("#" + `${newInputType}_${newId}`).append(`
            <input type="checkbox" id='${options[k].toLowerCase()}' value='${options[k].toLowerCase()}'>
            <label for='${options[k].toLowerCase()}'>${options[k]}</label><br>
          `);
        }
      }

      if (newInputType === "radio") {
        let options = [];
        let inputsArray = $("#new-input-form").serialize().split("&");

        for (let i = 0; i < inputsArray.length; i++) {
          options.push(
            inputsArray[i].slice(inputsArray[i].lastIndexOf("=") + 1)
          );
        }

         $("#questions-list").append(`
          <li class="app-inputs" id=${newId}>
            <div class="input-container">
              <fieldset id='${newInputType}_${newId}'>
                <legend>${newLabel}</legend>
              </fieldset>
            </div>
            <div class='checkbox-container'>
              <i class='fa fa-trash edit-input-trash-btn' aria-hidden='true' id=${newId}></i>
            </div>
          </li>`);

         for (let k = 0; k < options.length; k++) {
           $("#" + `${newInputType}_${newId}`).append(`
            <input type="radio" id='${options[k].toLowerCase()}' name=${newLabel} value='${options[k].toLowerCase()}'>
            <label for='${options[k].toLowerCase()}'>${options[k]}</label><br>
          `);
         }
      }

    $(".modal").css("display", "none");
    $("#option-list").empty();
    $(".options-container").addClass("hidden");
    $("#new-input-form").trigger("reset");
  });

  // selecting an option that requires option inputs
  $("#new-input").change(function () {
    let newId = optionIdCounter++;

    if (
      $("#new-input").val() === "text" ||
      $("#new-input").val() === "number" ||
      $("#new-input").val() === "textarea"
    ) {
      $("#option-list").empty();
      $(".options-container").addClass("hidden");
    }

    if (
      $("#new-input").val() === "select" ||
      $("#new-input").val() === "checkbox" ||
      $("#new-input").val() === "radio"
    ) {
      $(".options-container").removeClass("hidden");
      $("#option-list").append(`
          <li class="app-inputs" id=${newId}>
            <div class="input-container">
              <input type='text' class="app-question" name="user-input" required></input>
            </div>
            <div class='checkbox-container'>
              <i class='fa fa-trash new-input-trash-btn' aria-hidden='true' id=${newId}></i>
            </div>
          </li>`);
    }
  });

  $(".add-input-btn").click(function () {
    event.preventDefault();
    let newId = optionIdCounter++;

    if($("#option-list li").length < 5) {
      $("#option-list").append(`
            <li class="app-inputs" id=${newId}>
              <div class="input-container">
                <input type='text' class="app-question" name="user-input" required></input>
              </div>
              <div class='checkbox-container'>
                <i class='fa fa-trash new-input-trash-btn' aria-hidden='true' id=${newId}></i>
              </div>
            </li>`);
      }
  });


  $(".submit-btn").click(function () {
    // event.preventDefault();
    // $("form#main-input-form :input[type=text]").each(function () {
    //   var input = $(this).val();
    //   console.log(input);
    // });
  });
});
