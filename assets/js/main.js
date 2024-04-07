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