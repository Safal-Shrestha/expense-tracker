document.addEventListener("DOMContentLoaded", function() {
  // Get current date
  let currentDate = new Date();
  let currentYear = currentDate.getFullYear();
  let currentMonth = currentDate.getMonth() + 1; // Adjusted by 1 to match JSON data

  // Display current date
  displayDate(currentYear, currentMonth);

  // Handle button clicks
  document.getElementById("prevMonth").addEventListener("click", function() {
    currentMonth--;
    if (currentMonth < 1) {
      currentMonth = 12;
      currentYear--;
    }
    let jsonDate = { 
      month: currentMonth, 
      year: currentYear
    };
  
    let jsonDateString = JSON.stringify(jsonDate);
    displayDate(currentYear, currentMonth);
  });

  document.getElementById("nextMonth").addEventListener("click", function() {
    currentMonth++;
    if (currentMonth > 12) {
      currentMonth = 1;
      currentYear++;
    }
    let jsonDate = { 
      month: currentMonth, 
      year: currentYear
    };
  
    let jsonDateString = JSON.stringify(jsonDate);
    displayDate(currentYear, currentMonth);
  });

  // Function to display date
  function displayDate(year, month) {
    let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    document.getElementById("currentDate").innerText = months[month - 1] + ", " + year; // Adjusted by 1 to match array index
  }
});
