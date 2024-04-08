//Navbar
const sidebar = document.querySelector(".sidebar");
const sidebarClose = document.querySelector("#sidebar-close");

sidebarClose.addEventListener("click", () => sidebar.classList.toggle("close"));

//Expense Menu Button
var activeDropdown = null;
function openMenu(dropdownId) {
    var dropdownMenu = document.getElementById(dropdownId);

    if(activeDropdown && activeDropdown !== dropdownMenu)
    {
        activeDropdown.classList.remove("show");
    }

    dropdownMenu.classList.toggle("show");
    activeDropdown = dropdownMenu;
}

//Top Expense
function topExpense(){
    $.ajax({
        url: '../expense/include/topExpense.php',
        method: 'GET',
        success: function(response) {
            $('.list').html(response); // Update the content of expense list
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error here
        }
    });
}

document.addEventListener("DOMContentLoaded", function() {
    topExpense();
});