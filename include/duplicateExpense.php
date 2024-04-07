<?php
    include("db.php");

    $sql="SELECT * FROM expenses WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['id']);

    $stmt->execute();
    $result = $stmt->get_result();

    //current date and time of update
    date_default_timezone_set('Asia/Kathmandu');

    $currentTimestamp = time();
    $date = date("Y-m-d H:i:s", $currentTimestamp); // Format timestamp

    while($row = $result->fetch_assoc()){
        $name = $row['title'];
        $amount = $row['amount'];
        $desc = $row['description'];
        $cat_id = $row['category_id'];

        $sql1 = "INSERT INTO expenses(title, amount, description, created_at, updated_at, category_id) VALUES ('$name','$amount','$desc','$date','$date','$cat_id')";

        $conn->query($sql1);
    }