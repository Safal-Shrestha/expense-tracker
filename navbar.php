<link rel="stylesheet" href="assets/css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

<nav class="navbar">
    <div class="navbar-element">
        <img src="assets/img/menu.png" id="sidebar-close">
        <p>
            <?php
                // Change text based on the active page
                if ($active_page == 'index.php') {
                    echo "Overview";
                } elseif ($active_page == 'add.php') {
                    echo "Add Expenses";
                } elseif ($active_page == 'view.php') {
                    echo "Expenses";
                } else {
                    echo "Expense Tracker";
                }
            ?>
        </p>
    </div>
</nav>