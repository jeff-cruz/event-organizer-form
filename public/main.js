// Main page:
  // Only 5 questions should be



// To do list:
// CLICK ICON: ON CLICK, REMOVE ALL QUESTIONS IN ".questions-list"
// SAVE BUTTON: ON CLICK, ADD QUESTIONS THAT HAVE A INPUT CHECKED TRUE, IF FALSE THEN ADD HIDDEN CLASS TO QUESTION


$(document).ready(function () {
  // clicking the save
  $(".save-btn").click(function (event) {
    event.preventDefault();
    $(".title").text("Event Application");
    $(".edit-icon").removeClass("hidden"); // hide edit icon
    $(".submit-btn").removeClass("hidden"); // hide submit button
    $(".add-question-btn").addClass("hidden"); // show add question button
    $(".save-btn").addClass("hidden"); // show save button
    $(".checkbox-container").addClass("hidden"); // show checkboxes

    console.log("business-checkbox:", $("#business-checkbox:checked").val());

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

    // let listItems = $("#questions-list li");
    // listItems.each(function () {
    //   if ($("#business-checkbox").is(":checked")) {
    //     console.log(true);
    //   } else {
    //     console.log(false);
    //   }
    // });
  });

  $("#business-checkbox").click(function () {
    if ($("#business-checkbox").is(":checked")) {
      $("#business-checkbox").attr("checked", false);
    } else {
      $("#business-checkbox").attr("checked", true);
    }
  });

  // clicking the edit icon
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
  });

  // clicking the add question button
  $(".add-question-btn").click(function () {
    event.preventDefault();
    $(".modal").css("display", "block");
    $(".title").text("Add Question");
  });

  // clicking the add question button
  $(".x-icon").click(function () {
    $(".modal").css("display", "none");
    $(".title").text("Edit Event Application");
  });

});
