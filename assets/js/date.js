document.addEventListener("DOMContentLoaded", function() {
  // Get current date
  let currentDate = new Date();
  let currentYear = currentDate.getFullYear();
  let currentMonth = currentDate.getMonth() + 1; // Adjusted by 1 to match JSON data

  let jsonDate = { 
    month: currentMonth, 
    year: currentYear
  };

  let jsonDateString = JSON.stringify(jsonDate);

  // Display current date
  displayDate(currentYear, currentMonth);
  createCookie("jsonDate", jsonDateString, "10");

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
    createCookie("jsonDate", jsonDateString, "10");
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
    createCookie("jsonDate", jsonDateString, "10");
  });

  // Function to display date
  function displayDate(year, month) {
    let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    document.getElementById("currentDate").innerText = months[month - 1] + ", " + year; // Adjusted by 1 to match array index
  }
	

  // Function to create the cookie 
  function createCookie(name, value, secs) {
    let expires;
      if (secs) {
          let date = new Date();
          date.setTime(date.getTime() + (secs * 1000));
          expires = "; expires=" + date.toGMTString();
      } else {
          expires = "";
      }
      document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
  }

});
