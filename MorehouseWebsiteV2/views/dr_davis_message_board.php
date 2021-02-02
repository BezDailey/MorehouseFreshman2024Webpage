<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/home.css" />
    <link rel="stylesheet" type="text/css" href="../css/dr_davis_message_board.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dr. Davis' Message Board</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php include("../views/nav.php"); ?>
    <div id="img_div">
        <div id="img_div_words">Professor Davis' Message Board</div>
    </div>
    <div id="color_block"></div>
    <div class="message_board_container">
        <h2>Message Board</h2>
        <?php if($messages != null): ?>
        <?php foreach($messages as $message): ?>
        <div class="message_container">
            <div class="message_title">
                <h3><?php echo($message->subject); ?></h3>
                <h4>Author: <?php echo($message->author); ?></h4>           
            </div>
            <p><?php echo($message->text); ?></p>
            <form method="post" action="../controllers/dr_davis_message_board_controller.php" class="btn_container">
                <input type="hidden" name="action" value="show_reply_form">
                <input type="hidden" name="message_id" value="<?php echo($message->id); ?>">
                <input type="submit" value="Reply" class="btn">
            </form>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>        
    </div>
    <footer>
        <a href="../controllers/managers_area_controller.php">Manager's Area</a>
    </footer>
    <script src="../scripts/home.js"></script>
</body>
</html>