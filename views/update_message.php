<?php 
    if(!isset($_SESSION['is_valid_admin'])) {
        header("Location: ../controllers/home_controller.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/home.css" />
    <link rel="stylesheet" type="text/css" href="../css/managers_area.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Update Message</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php include("../views/nav.php"); ?>
    <div id="img_div">
        <div id="img_div_words">Update Message</div>
    </div>
    <div id="color_block"></div>
    <?php if(isset($error)): ?>
    <div class="error_alert">
        <p><?php echo($error); ?></p>
    </div>
    <?php endif; ?>
    <div class="update_message_container">
        <h2>Update Message</h2>
        <form action="../controllers/managers_area_controller.php" method="post" class="update_message_form">
            <label for="author">Author name:</label><br>
            <input type="text" id="author" name="author" value="<?php echo($message->author); ?>" required><br>
            <label for="subject">Subject:</label><br>
            <input type="text" id="subject" name="subject" value="<?php echo($message->subject); ?>" required><br>
            <label for="text">Message:</label><br>
            <textarea id="text" name="text" required><?php echo($message->text); ?></textarea><br>
            <label for="date">Date:</label><br>
            <input type="date" id="date" name="date" value="<?php echo($message->date); ?>" required pattern="\d{2}/\d{2}/\d{4}"><br>
            <input type="hidden" name="message_id" value="<?php echo($message->id); ?>">
            <input type="hidden" name="action" value="update_message">
            <input type="submit" class="form_btn" value="submit"> 
        </form>
    </div>
    <footer>
        <a href="../controllers/managers_area_controller.php">Manager's Area</a>
    </footer>
    <script src="../scripts/home.js"></script>
</body>
</html>