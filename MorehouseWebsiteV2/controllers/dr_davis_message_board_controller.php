<?php
    require('../utility/secure_redirect.php');
    require_once('../models/database.php');
    require_once("../models/event.php");
    require_once("../models/message.php");
    require_once("../models/academic_calendar_db.php");
    require_once("../models/message_db.php");
    require_once("../models/response_db.php");

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'dr_davis_message_board';
    }

    switch($action) {
        case'show_home':
            header('Location: ../controllers/home_controller.php');
            break;
        case'first_year_resources':
            header('Location: ../controllers/first_year_resources_controller.php');
            break;
        case'creativity_spotlight':
            header('Location: ../controllers/creativity_spotlight_controller.php');
            break;
        case'dr_davis_message_board':
            $messages = MessageDB::get_messages();
            include('../views/dr_davis_message_board.php');
            break;
        case 'show_reply_form':
            $id = filter_input(INPUT_POST, 'message_id', FILTER_SANITIZE_SPECIAL_CHARS);
            if($id == NULL || $id === FALSE) {
                $error = "Invalid message id. Check website code on server.";
                include('../errors/error.php');
                break;
            } else {
                $message = MessageDB::get_message($id);
                include('../views/reply_form.php');
            }
            break;
        case 'reply_to_message':
            $message_id = filter_input(INPUT_POST, 'message_id', FILTER_SANITIZE_SPECIAL_CHARS);
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            $student_id = filter_input(INPUT_POST, 'student_id', FILTER_SANITIZE_SPECIAL_CHARS);
            $text = filter_input(INPUT_POST, 'response', FILTER_SANITIZE_SPECIAL_CHARS);
            if($name === FALSE || $message_id === FALSE || $student_id === FALSE || $text === FALSE || $name == NULL || $message_id == NULL || $student_id == NULL || $text == NULL) {
                $error = "Invalid response date. Check all fields and try again.";
                include('../errors/error.php');
                break;
            } else {
                ResponseDB::create_response($text, $name, $student_id, $message_id);
                header("Location: ../controllers/dr_davis_message_board_controller.php");
            }
            break;
    }
?>