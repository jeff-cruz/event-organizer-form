// To do list:
// CLICK ICON: ON CLICK, REMOVE ALL QUESTIONS IN ".questions-list"
// SAVE BUTTON: ON CLICK, ADD QUESTIONS THAT HAVE A INPUT CHECKED TRUE, IF FALSE THEN ADD HIDDEN CLASS TO QUESTION


$(document).ready(function () {
  // clicking the edit icon
  $(".edit-icon").click(function () {
    $(".title").text("Edit Event Application"); // change name of form
    $(".edit-icon").hide(); // hide edit icon
    $(".submit-btn").hide(); // hide submit button
    $(".add-question-btn").removeClass("hidden"); // show add question button
    $(".save-btn").removeClass("hidden"); // show save button
    $(".input-checkbox").removeClass("hidden"); // show checkboxes
    $(".app-question").removeClass("hidden"); // show all standard questions
  });

  $(".save-button").click(function () {
    let listItems = $("#questions-list li");

    listItems.each(function () {
      if ($(".input-checkbox").is(":checked")) {
        console.log(true);
      }
    });
  });
});
