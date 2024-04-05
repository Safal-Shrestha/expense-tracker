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

    if ($result->num_rows === 0) {
        echo "<p class='error'>No record</p>";
    }
    $s_no=0;
    while($row = $result->fetch_assoc()){
        $s_no++;
        $id = $row['id'];
        $name = $row['title'];
        $category = $row['category_label'];
        $amount = $row['amount'];
        $date = $row['created_at'];
        $desc = $row['description'];
        $img = $row['img_name'];
?>

    <div class="expense-item">
        <div class="item item-left">
            <img src="assets/img/<?php echo $img;?>">
            <div class="item-details">
                <p class="category"><?php echo $category;?></p>
                <p class="name"><?php echo $name;?></p>
            </div>
        </div>
        <div class="item item-right">
            <div class="price-time">
                <p>Rs. <?php echo $amount;?></p>
                <p><?php echo $date;?></p>
            </div>
            <div class="menu-dropdown">
                <button onclick="openMenu(<?php echo $id;?>)" class="dropbtn">
                    <img src="assets/img/three_dot.png" class="drop-three">
                </button>
                <div class="menu-content" id="<?php echo $id;?>">
                    <button>
                        <p>Duplicate Transaction</p>
                    </button>
                    <button>
                        <p>Edit Transaction</p>
                    </button>
                    <button>
                        <p>Delete Transaction</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php 
    }
    // $num_transactions = $s_no;
    // json_encode(array("html" => ob_get_clean(), "num_transactions" => $num_transactions));
?>