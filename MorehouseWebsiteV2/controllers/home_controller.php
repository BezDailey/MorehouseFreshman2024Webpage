<?php
    require('../utility/secure_redirect.php');
    require_once('../models/database.php');
    require_once("../models/event.php");
    require_once("../models/academic_calendar_db.php");

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'show_home';
    }

    switch($action) {
        case'show_home':
            $events = AcademicCalendarDB::get_events();
            include('../views/home.php');
            break;
        case'first_year_resources':
            header('Location: ../controllers/first_year_resources_controller.php');
            break;
        case'creativity_spotlight':
            header('Location: ../controllers/creativity_spotlight_controller.php');
            break;
        case'dr_davis_message_board':
            header('Location: ../controllers/dr_davis_message_board_controller.php');
            break;
    }
?>