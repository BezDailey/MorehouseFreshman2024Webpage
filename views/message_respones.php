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
    <link rel="stylesheet" type="text/css" href="../css/dr_davis_message_board.css" />
    <link rel="stylesheet" type="text/css" href="../css/managers_area.css" />
    <link rel="stylesheet" type="text/css" href="../css/message_respones.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Message Responses</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php include("../views/nav.php"); ?>
    <div id="img_div">
        <div id="img_div_words">Message Responses</div>
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
        <?php if($responses != NULL): ?>
        <?php foreach($responses as $response): ?>
        <div class="message_container">
            <div class="message_title">
                <h3>Student: <?php echo($response->name); ?></h3>
                <h4>Student ID: <?php echo($response->studentId); ?></h4>
                <h4>Date: <?php echo($response->date); ?></h4>            
            </div>
            <p><?php echo($response->text); ?></p>
            <form method="post" action="../controllers/managers_area_controller.php" class="btn_container">
                <input type="hidden" name="action" value="delete_response">
                <input type="hidden" name="response_id" value="<?php echo($response->id); ?>">
                <input type="submit" value="Delete" class="btn">
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