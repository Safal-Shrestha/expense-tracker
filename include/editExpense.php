<?php
    include("db.php");

    $category=$_POST["form-category"];
    $name=$_POST["name"];
    $amount=$_POST["amt"];
    $desc=$_POST["desc"];
    $date=$_POST["time"];
    $id=$_POST["id"];

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

    $sql = "UPDATE expenses SET title ='$name', amount='$amount', description='$desc', created_at='$date', updated_at='$date2', category_id='$category' WHERE id='$id'";


    if($conn->query($sql)===TRUE){
        header('Location: ../view.php');
    } 