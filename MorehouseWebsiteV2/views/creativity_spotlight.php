<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/home.css" />
    <link rel="stylesheet" type="text/css" href="../css/creativity_spotlight.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Creativity Spotlight</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php include("../views/nav.php"); ?>
    <div id="img_div">
        <div id="img_div_words">Creativity Spotlight</div>
    </div>
    <div id="color_block"></div>
    <div class="website_developers_container">
        <h2>Website Developers</h2>
        <div class="website_developers">
            <div class="developer dev_left">
                <img src="../images/jabezDailey.png"/>
                <h3>Jabez Dailey</h3>
            </div>
            <div class="developer dev_right">
                <img src="../images/davidColeman.png"/>
                <h3>David Coleman</h3>
            </div>
        </div>
    </div>
    <div class="student_businesses_list">
        <h2>Student Owned Businesses</h2>
        <div class="student_business_container">
            <div class="student_business_info">
                <h3>Marley Entertainment</h3>
                <h4>https://marleyentertainment.square.site</h4>
            </div>
            <a href="https://marleyentertainment.square.site/s/shop" class="student_business_btn">Visit</a>
        </div>
        <div class="student_business_container">
            <div class="student_business_info">
                <h3>All Black Everything Collection</h3>
                <h4>https://www.shopabecollection.com</h4>
            </div>
            <a href="https://www.shopabecollection.com/collections/tees" class="student_business_btn">Visit</a>
        </div>
    </div>
    <!-- 
    <div class="student_spotlight_list">
        <h2>Student Spotlight</h2>
        
    </div> -->
    <footer>
        <a href="../controllers/managers_area_controller.php">Manager's Area</a>
    </footer>
    <script src="../scripts/home.js"></script>
</body>
</html>