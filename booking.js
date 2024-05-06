
  document.addEventListener("DOMContentLoaded", function() {
    // Find the "Book Table" button
    var bookTableButton = document.querySelector(".btn.primary-btn");

    // Add a click event listener to the button
    bookTableButton.addEventListener("click", function(event) {
      // Prevent the default form submission behavior
      event.preventDefault();

      // Display an alert message
      alert("Your table has been booked successfully!");
    });
  });

