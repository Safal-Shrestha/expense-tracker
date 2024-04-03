<?php 
    $active_page = basename($_SERVER['PHP_SELF']);
    include("include/db.php");
    $result=$conn->query("SELECT * FROM categories");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expenses</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'sidebar.html'; ?>
    <?php include 'navbar.php'; ?>
    <div class="main" id="add">
        <div class="expense-form">
            <h1>NEW EXPENSE</h1>
            <form id="addExpense" action="include/addExpense.php" method="POST" enctype="multipart/form-data">
                <div class="form-head">
                    <div class="form-content form-left">
                        <div class="form-group">
                            <div class="category-image" id="image-control">
                                <img id="selected-image" src="" class="">
                            </div>
                            <div class="form-content">
                                <label for="category">Category</label>
                                <select name="form-category" required id="imageSelector" class="form-field">
                                    <option disabled selected hidden>Choose Category</option>
                                    <?php 
                                        while($row = $result->fetch_assoc()){
                                            $id = $row['id'];
                                            $label = $row['label'];
                                    ?>
                                        <option value="<?php echo $id; ?>"><?php echo $label;?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <img src="assets/img/product_label.png" class="label-img">
                            <div class="form-content">
                                <label for="name">Name</label>
                                <input name="name" type="text" required placeholder="Name" class="form-field">
                            </div>
                        </div>
                        <div class="form-group">
                            <img src="assets/img/date.png" class="date-img">
                            <div class="form-content">
                                <label for="time">Purchase Date</label>
                                <input name="time" type="datetime-local" class="form-field">
                            </div>
                        </div>
                    </div>
                    <div class="form-content form-right">
                        <div class="form-group">
                            <div class="form-content">
                                <label for="amt">Amount</label>
                                <div class="prefix">
                                    <p>Rs.</p>
                                    <input name="amt" type="number" required placeholder="0" class="form-field" inputmode="numeric">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-content">
                                <label for="desc">Description</label>
                                <textarea name="desc" required placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <button>Add Expense</button>
            </form>
        </div>
    </div>
    <script src="assets/js/img.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>