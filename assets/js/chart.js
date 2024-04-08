//Graph 
const xValues = ['January','February','March','April','May','June','July','August','September','October','November','December'];

//Retrieve Data for yValues
$.ajax({
  url: '../expense/include/expenseChart.php', // Replace with the actual endpoint URL
  type: 'GET',
  dataType: 'json',
  success: function(response) {
    // Assuming the response contains the yValues array
    const yValues = response.yValues;
    
    // Create the chart after successfully retrieving the data
    createChart(yValues);
  },
  error: function(xhr, status, error) {
    // Handle error
    console.error('Failed to fetch data:', error);
  }
});

function createChart(yValues) {
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
}