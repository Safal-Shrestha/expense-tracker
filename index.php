<?php
    $active_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php include 'sidebar.html'; ?>
    <?php include 'navbar.php'; ?>
    <div class="main" id="overview">
        <div class="cards topExpense">
            <h2>Top Expense</h2>
            <div class="list">
                
            </div>
        </div>
        <div class="cards expenseChart">
            <h2>Expense Chart</h2>
            <canvas id="expense" style="width:100%;max-width:700px"></canvas>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/chart.js"></script>
</body>
</html>