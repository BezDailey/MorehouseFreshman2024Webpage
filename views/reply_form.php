<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/home.css" />
    <link rel="stylesheet" type="text/css" href="../css/dr_davis_message_board.css" />
    <link rel="stylesheet" type="text/css" href="../css/managers_area.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Message Response</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php include("../views/nav.php"); ?>
    <div id="img_div">
        <div id="img_div_words">Message Response</div>
    </div>
    <div id="color_block"></div>
    <div class="message_board_container">
        <h2>Selected Message</h2>
        <div class="message_container">
            <div class="message_title">
                <h3>Subject: <?php echo($message->subject); ?></h3>
                <h4>Author: <?php echo($message->author); ?></h4>           
            </div>
            <p><?php echo($message->text); ?></p>
        </div>      
    </div>
    <div class="message_reply_form_container">
        <h2>Response Form</h2>
        <form method="post" action="../controllers/dr_davis_message_board_controller.php" class="message_reply_form">
            <input type="hidden" name="action" value="reply_to_message">
            <input type="hidden" name="message_id" value="<?php echo($message->id); ?>" >
            <label for="name">name:</label><br>
            <input type="text" id="name" name="name" required><br>
            <label for="student_id">student id:</label><br>
            <input type="text" id="student_id" name="student_id" required><br>
            <label for="response">response:</label><br>
            <textarea id="response" name="response" required></textarea><br>
            <input type="submit" class="form_btn" value="submit">
        </div>
    </div>
    <footer>
        <a href="../controllers/managers_area_controller.php">Manager's Area</a>
    </footer>
    <script src="../scripts/home.js"></script>
</body>
</html>