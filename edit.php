<?php 
    include("include/db.php");
    $sql="SELECT expenses.category_id as expense_id, expenses.id, expenses.title, expenses.amount, expenses.description, expenses.created_at, categories.label as category_label, categories.img as img_name
    FROM expenses
    JOIN categories ON expenses.category_id = categories.id
    WHERE expenses.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $fetch = $stmt->get_result();
    $result=$conn->query("SELECT * FROM categories");
?>

<div class="expense-form">
    <?php
        while($row = $fetch->fetch_assoc()){
            $exp_id = $row['id'];
            $name = $row['title'];
            $amount = $row['amount'];
            $desc = $row['description'];
            $created_at = $row['created_at'];
            $cat_id = $row['expense_id'];
            $img = $row['img_name'];
    ?>
    <form id="editExpense" action="include/editExpense.php" method="POST" enctype="multipart/form-data">
        <div class="form-head">
            <div class="form-content form-left">
                <div class="form-group">
                    <div class="category-image" id="image-control">
                        <img id="selected-image" src="assets/img/<?php echo $img; ?>" class="show-image">
                    </div>
                    <div class="form-content">
                        <label for="category">Category</label>
                        <select name="form-category" required id="imageSelector" class="form-field">
                            <option disabled hidden>Choose Category</option>
                            <?php 
                                while($row = $result->fetch_assoc()){
                                    $id = $row['id'];
                                    $label = $row['label'];
                            ?>
                                <option value="<?php echo $id; ?>" <?php if($id == $cat_id) echo "selected"; ?>><?php echo $label;?></option>
                                <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <img src="assets/img/product_label.png" class="label-img">
                    <div class="form-content">
                        <label for="name">Name</label>
                        <input name="name" type="text" required placeholder="Name" class="form-field" value="<?php echo $name; ?>">
                        <input name="id" type="number" value="<?php echo $exp_id; ?>" hidden>
                    </div>
                </div>
                <div class="form-group">
                    <img src="assets/img/date.png" class="date-img">
                    <div class="form-content">
                        <label for="time">Purchase Date</label>
                        <input name="time" type="datetime-local" class="form-field" value="<?php echo $created_at; ?>">
                    </div>
                </div>
            </div>
            <div class="form-content form-right">
                <div class="form-group">
                    <div class="form-content">
                        <label for="amt">Amount</label>
                        <div class="prefix">
                            <p>Rs.</p>
                            <input name="amt" type="number" required placeholder="0" class="form-field" inputmode="numeric" value="<?php echo $amount; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-content">
                        <label for="desc">Description</label>
                        <textarea name="desc" required placeholder="Description"><?php echo $desc; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <button>Update</button>
    </form>
    <?php } ?>
</div>
<script src="assets/js/img.js"></script>