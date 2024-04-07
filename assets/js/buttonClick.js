function duplicateTransaction(id){
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

function deleteTransaction(id){
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
