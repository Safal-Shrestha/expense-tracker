// Get current date
let currentDate = new Date();
let currentYear = currentDate.getFullYear();
let currentMonth = currentDate.getMonth() + 1;

// Function to display date
function displayDate(year, month) {
    let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    document.getElementById("currentDate").innerText = months[month - 1] + ", " + year;
}

// Function to update expense list
function updateExpenseList(month, year) {
    $.ajax({
        url: '../expense/include/showExpenseMonth.php',
        method: 'GET',
        data: { month: month, year: year },
        success: function(response) {
            $('.expense-list').html(response); // Update the content of expense list
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error here
        }
    });
}


function updateTransactionNo(month, year) {
    $.ajax({
        url: '../expense/include/transactionNo.php',
        method: 'GET',
        data: { month: month, year: year },
        success: function(response) {
            $('.transaction-count').html(response); // Update the content of expense list
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error here
        }
    });
}

//Function to save selected month and date
function saveDate(year, month) {
    const dateObj = { year: year, month: month };
    localStorage.setItem('currentDate', JSON.stringify(dateObj));
}

document.addEventListener("DOMContentLoaded", function() {
    // Display current date
    displayDate(currentYear, currentMonth);

    // Update expense list for the current month
    updateExpenseList(currentMonth, currentYear);

    //Update transaction number
    updateTransactionNo(currentMonth, currentYear);

    saveDate(currentYear, currentMonth);

    // Handle button clicks
    document.getElementById("prevMonth").addEventListener("click", function() {
        currentMonth--;
        if (currentMonth < 1) {
            currentMonth = 12;
            currentYear--;
        }
        saveDate(currentYear, currentMonth);
        displayDate(currentYear, currentMonth);
        updateExpenseList(currentMonth, currentYear);
        updateTransactionNo(currentMonth, currentYear);
    });

    document.getElementById("nextMonth").addEventListener("click", function() {
        currentMonth++;
        if (currentMonth > 12) {
            currentMonth = 1;
            currentYear++;
        }
        saveDate(currentYear, currentMonth);
        displayDate(currentYear, currentMonth);
        updateExpenseList(currentMonth, currentYear);
        updateTransactionNo(currentMonth, currentYear);
    });
});
