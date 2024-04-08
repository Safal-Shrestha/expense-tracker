<?php
    include('db.php');
    $sql = "SELECT expenses.category_id as expense_id, expenses.id, expenses.title, categories.label as category_label, categories.img as img_name,
            SUM(expenses.amount) AS total_amount
        FROM expenses
        JOIN categories ON expenses.category_id = categories.id
        GROUP BY expenses.category_id
        ORDER BY total_amount DESC
        LIMIT 3";

    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        $name = $row['category_label'];
        $img = $row['img_name'];    
?>
    <div class="item">
        <img src="assets/img/<?php echo $img;?>">
        <p><?php echo $name;?></p>
    </div>
<?php } ?>