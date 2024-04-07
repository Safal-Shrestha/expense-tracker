<?php
    include("db.php");

    $sql="DELETE from expenses WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['id']);

    $stmt->execute();