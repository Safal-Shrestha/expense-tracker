function duplicateTransaction(id){
    
}

function editTransaction(id){

}

function deleteTransaction(id){
    $.ajax({
        url: '../expense/include/deleteExpense.php',
        method: 'GET',
        data: { id: id},
        success: function(response) {
            console.log('Entry Deleted'); // Update the content of expense list
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error here
        }
    });
}