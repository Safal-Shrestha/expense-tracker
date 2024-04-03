<?php
    include("db.php");

    $category=$_POST["form-category"];
    $name=$_POST["name"];
    $amount=$_POST["amt"];
    $desc=$_POST["desc"];
    $date=$_POST["time"];

    //to prevent from mysqli injection  
    $category = stripcslashes($category);  
    $name = stripcslashes($name);
    $amount = stripcslashes($amount);  
    $desc = stripcslashes($desc);  
    $date = stripcslashes($date);  
    $category = mysqli_real_escape_string($conn, $category);  
    $name = mysqli_real_escape_string($conn, $name);
    $amount = mysqli_real_escape_string($conn, $amount);  
    $desc = mysqli_real_escape_string($conn, $desc);  
    $date = mysqli_real_escape_string($conn, $date);

    //current date and time of update
    date_default_timezone_set('Asia/Kathmandu');

    $currentTimestamp = time();
    $date2 = date("Y-m-d H:i:s", $currentTimestamp); // Format timestamp

    $sql = "INSERT INTO expenses(title, amount, description, created_at, updated_at, category_id) VALUES ('$name','$amount','$desc','$date','$date2','$category')";


    if($conn->query($sql)===TRUE){
        header('Location: ../index.php');
    } 