<?php
    include('db.php');

    date_default_timezone_set('Asia/Kathmandu');

    $currentTimestamp = time();
    $date = date("Y", $currentTimestamp); // Format timestamp

    $yValues = array_fill(1, 12, 0);

    $sql = "SELECT SUM(amount) as total_amount,
            EXTRACT(MONTH FROM expenses.created_at) AS month
            FROM expenses
            WHERE EXTRACT(YEAR FROM expenses.created_at) = '$date'
            GROUP BY month";

    $result = $conn->query($sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $month = intval($row['month']);
        $total_amount = intval($row['total_amount']);
        $yValues[$month] = $total_amount;
    }

    echo json_encode(['yValues' => array_values($yValues)]);

