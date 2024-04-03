//Navbar
const sidebar = document.querySelector(".sidebar");
const sidebarClose = document.querySelector("#sidebar-close");

sidebarClose.addEventListener("click", () => sidebar.classList.toggle("close"));

//Graph 
const xValues = ['January','February','March','April','May','June','July','August','September','October','November','December'];
const yValues = [1000,3000,5000,7000,10000,13000,15000,20000,25000,15000,13000];

new Chart("expense", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 0, max:25000}}],
    }
  }
});

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