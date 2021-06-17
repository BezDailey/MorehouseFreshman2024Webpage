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
    <title>First Year Resources</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php include("../views/nav.php"); ?>
    <div id="img_div">
        <div id="img_div_words">Manager's Area</div>
    </div>
    <div id="color_block"></div>
    <?php if(isset($error)): ?>
    <div class="error_alert">
        <p><?php echo($error); ?></p>
    </div>
    <?php endif; ?>
    <div class="add_message_container">
        <h2>Add Message</h2>
        <form action="../controllers/managers_area_controller.php" method="post" class="add_message_form">
            <label for="author">Author name:</label><br>
            <input type="text" id="author" name="author" required><br>
            <label for="subject">Subject:</label><br>
            <input type="text" id="subject" name="subject" required><br>
            <label for="text">Message:</label><br>
            <textarea id="text" name="text" required></textarea><br>
            <input type="hidden" name="action" value="create_message">
            <input type="submit" class="form_btn" value="submit"> 
        </form>
    </div>
    <div class="delete_update_message_container">
        <h2>Delete/Update Message</h2>
        <table class="message_table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php if ($messages != NULL): ?>
            <?php foreach($messages as $row): ?>
                <tr>
                    <td><?php echo($row->subject); ?></td>
                    <td><?php echo($row->author); ?></td>
                    <td><?php echo($row->date); ?></td>
                    <td>
                        <form class="table_form" action="../controllers/managers_area_controller.php" method="post">
                            <input type="hidden" name="action" value="delete_message">
                            <input type="hidden" name="message_id" value="<?php echo($row->id); ?>">
                            <input type="submit" class="table_btn" value="Delete"> 
                        </form>
                    </td>
                    <td>
                        <form class="table_form" action="../controllers/managers_area_controller.php" method="post">
                            <input type="hidden" name="action" value="update_message_form">
                            <input type="hidden" name="message_id" value="<?php echo($row->id); ?>">
                            <input type="submit" class="table_btn" value="Update"> 
                        </form>
                    </td>
                    <td>
                        <form class="table_form" action="../controllers/managers_area_controller.php" method="post">
                            <input type="hidden" name="action" value="see_message_replies">
                            <input type="hidden" name="message_id" value="<?php echo($row->id); ?>">
                            <input type="submit" class="table_btn" value="Replies"> 
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <footer>
        <a href="../controllers/managers_area_controller.php">Manager's Area</a>
        <a class="logout" href="../controllers/managers_area_controller.php?action=logout">Logout</a>
    </footer>
    <script src="../scripts/home.js"></script>
</body>
</html>