<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/home.css" />
    <link rel="stylesheet" type="text/css" href="../css/managers_area.css" />
    <link rel="stylesheet" type="text/css" href="../css/manager_login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Manager Login</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php include("../views/nav.php"); ?>
    <div id="img_div">
        <div id="img_div_words">Manager Login</div>
    </div>
    <div id="color_block"></div>
    <?php if(isset($error)): ?>
    <div class="error_alert">
        <p><?php echo($error); ?></p>
    </div>
    <?php endif; ?>
    <div class="manager_login_container">
        <form action="../controllers/managers_area_controller.php" method="post">
            <label for="username">username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="hidden" name="action" value="manager_login">
            <input type="submit" class="form_btn" value="login">
        </form>
    </div>
    <footer>
        <a href="../controllers/managers_area_controller.php">Manager's Area</a>
    </footer>
    <script src="../scripts/home.js"></script>
</body>
</html>