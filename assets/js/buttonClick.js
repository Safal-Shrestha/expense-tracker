function readDate(){
    const storedDate = localStorage.getItem('currentDate');
    if (storedDate) {
        const dateObj = JSON.parse(storedDate);
        return { year: dateObj.year, month: dateObj.month };
    } else {
        // Return default values if no data is found
        return { year: new Date().getFullYear(), month: new Date().getMonth() + 1 };
    }
}

function duplicateTransaction(id){
    const storedDate = readDate();

    let selectedYear = storedDate.year;
    let selectedMonth = storedDate.month;

    $.ajax({
        url: '../expense/include/duplicateExpense.php',
        method: 'GET',
        data: { id: id},
        success: function(response) {
            updateExpenseList(currentMonth, currentYear);
            updateTransactionNo(currentMonth, currentYear);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error here
        }
    });
    
}

function editTransaction(id){
    const storedDate = readDate();

    let selectedYear = storedDate.year;
    let selectedMonth = storedDate.month;

    $.ajax({
        url: '../expense/include/editExpense.php',
        method: 'GET',
        data: { id: id},
        success: function(response) {
            updateExpenseList(currentMonth, currentYear);
            updateTransactionNo(currentMonth, currentYear);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error here
        }
    });
}

function deleteTransaction(id){
    const storedDate = readDate();

    let selectedYear = storedDate.year;
    let selectedMonth = storedDate.month;

    $.ajax({
        url: '../expense/include/deleteExpense.php',
        method: 'GET',
        data: { id: id},
        success: function(response) {
            updateExpenseList(currentMonth, currentYear);
            updateTransactionNo(currentMonth, currentYear);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error here
        }
    });
}
