<?php
    require_once('../models/database.php');
    require_once("../models/event.php");
    require_once("../models/academic_calendar_db.php");

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'show_resources';
    }

    switch($action) {
        case'show_resources':
            include('../views/first_year_resources.php');
            break;
        case'show_home':
            header("Location: ../controllers/home_controller.php?action=show_home");
            break;
    }
?>