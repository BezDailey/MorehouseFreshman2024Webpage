
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/home.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Freshman Class of 2024</title>
</head>
<body>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div id="mobile_nav_components">
        <nav class="" id="mobile_nav">
            <p class="mobile_logo">MOREHOUSE <span>2024</span></p>
            
            <a class="icon" href="javascript:void(0);">
                <i class="fa fa-bars fa-lg"></i>
            </a>
        </nav>
        <div class="" id="mobile_nav_links">
            <a href="">The House</a>
            <a href="">First Year Resources</a>
            <a href="">Creativity Spotlight</a>
            <a href="">Dr. Davis' Message Board</a>
        </div>
    </div>

    <ul class="transparent_nav" id="nav">
        <p class="logo">Morehouse <span id='logo_numbers' class='logo_numbers_white'>2024</span></p>
        <li><a href="">The House</a></li>
        <li><a href="../controllers/home_controller.php?action=first_year_resources">First Year Resources</a></li>
        <li><a href="">Creativity Spotlight</a></li>
        <li><a href="">Dr. Davis' Message Board</a></li>
    </ul>
    <div id="img_div">
        <div id="img_div_words">MOREHOUSE 2024</div>
    </div>
    <div id="color_block"></div>
    <div class="slideshow_container">
        <h1>Academic Calendar</h1> 
        <?php foreach($events as $event): ?>
            <div class="slide" id="<?php echo $event->id;?>">
                <div class="slide_text">
                    <h1><?php echo $event->date;?></h1>
                    <p><?php echo $event->info;?></p>
                </div>
            </div> 
        <?php endforeach; ?>      
        <a class="prev" onclick="">&#10094;</a>
        <a class="next" onclick="">&#10095;</a>
        <div class="slide_number">
            1/1
        </div>
    </div>
    <footer>
        <a href="">Manager's Area</a>
    </footer>
    <script src="../scripts/home.js"></script>
</body>
</html>