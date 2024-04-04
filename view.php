<?php 
    $active_page = basename($_SERVER['PHP_SELF']);
    include("include/db.php");
    $result=$conn->query("SELECT expenses.category_id as expense_id, expenses.id, expenses.title, expenses.amount, expenses.description, expenses.created_at, categories.label as category_label, categories.img as img_name
    FROM expenses
    JOIN categories ON expenses.category_id = categories.id;");
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
            <h1>Transactions: <?php echo $s_no;?></h1>
            <hr class="line">
            <div class="expense-list">
                <?php
                    $s_no=0;
                    while($row = $result->fetch_assoc() and $s_no<$row){
                        ++$s_no;
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
                <?php }?>
            </div>
        </div>
    </div>
    <script src="assets/js/date.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>