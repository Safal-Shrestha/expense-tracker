<?php 
    $active_page = basename($_SERVER['PHP_SELF']);
    include("include/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php include 'sidebar.html'; ?>
    <?php include 'navbar.php'; ?>
    <div class="main" id="view">
        <div class="date">
            <button class="change-date" id="prevMonth">
                <img src="assets/img/arrow.png" class="left">
            </button>
            <h1 id="currentDate"></h1>
            <button class="change-date" id="nextMonth">
                <img src="assets/img/arrow.png" class="right">
            </button>
        </div>
        <div class="info">
            <h1 id="transaction-count" class="transaction-count"></h1>
            <hr class="line">
            <div class="expense-list">

            </div>
        </div>
    </div>
    <script src="assets/js/date.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/buttonClick.js"></script>
</body>
</html>