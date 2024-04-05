<?php
    include("db.php");

    $sql="SELECT expenses.category_id as expense_id, expenses.id, expenses.title, expenses.amount, expenses.description, expenses.created_at, categories.label as category_label, categories.img as img_name
    FROM expenses
    JOIN categories ON expenses.category_id = categories.id
    WHERE EXTRACT(MONTH FROM expenses.created_at) = ?
    AND EXTRACT(YEAR FROM expenses.created_at) = ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $_GET['month'], $_GET['year']);

    // Assuming $month and $year are set appropriately with the desired values

    $stmt->execute();
    $result = $stmt->get_result();

    $s_no=0;
    while($row = $result->fetch_assoc()){
        $s_no++;
    }

    echo("Transactions: ".$s_no);