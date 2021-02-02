<?php
    require('../utility/secure_redirect.php');
    session_start();
    require_once('../models/database.php');
    require_once("../models/event.php");
    require_once("../models/message.php");
    require_once("../models/response.php");
    require_once("../models/academic_calendar_db.php");
    require_once("../models/message_db.php");
    require_once("../models/response_db.php");
    require_once("../models/admin_db.php");

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'show_managers_area';
    }

    if(!isset($_SESSION['is_valid_admin']) && ($action != "manager_login" && $action != "logout")) {
        $action = 'login_form';
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
            header('Location: ../controllers/dr_davis_message_board_controller.php');
            break;
        case'show_managers_area':
            $messages = MessageDB::get_messages();
            include('../views/managers_area.php');
            break;
        case'create_message':
            $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS);
            $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
            $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_SPECIAL_CHARS);
            if($author == NULL || $subject == NULL || $text == NULL || $author === FALSE || $subject === FALSE || $text === FALSE) {
                $error = "Invalid message data. Check all fields and try again.";
                $messages = MessageDB::get_messages();
                include('../views/managers_area.php');
                unset($error);
                break;
            } else {
                MessageDB::create_message($author, $text, $subject);
                header("location: ../controllers/managers_area_controller.php");
            }
            break;
        case'delete_message':
            $id = filter_input(INPUT_POST, 'message_id', FILTER_SANITIZE_SPECIAL_CHARS);
            if($id == NULL || $id === FALSE) {
                $error = "Invalid message id. Check website code on server.";
                include('../errors/error.php');
                break;
            } else {
                MessageDB::delete_message($id);
                header("location: ../controllers/managers_area_controller.php");
            }
            break;
        case'update_message_form':
            $id = filter_input(INPUT_POST, 'message_id', FILTER_SANITIZE_SPECIAL_CHARS);
            if($id == NULL || $id === FALSE) {
                $error = "Invalid message id. Check website code on server.";
                include('../errors/error.php');
                break;
            } else {
                $message = MessageDB::get_message($id);
                include("../views/update_message.php");
            }
            break;
        case'update_message':
            $id = filter_input(INPUT_POST, 'message_id', FILTER_SANITIZE_SPECIAL_CHARS);
            $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS);
            $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
            $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_SPECIAL_CHARS);
            $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
            if(preg_match("/\d{4}-\d{2}-\d{2}/",$date) != 1 || strlen($date) != 10 ) {
                $error = "Invalid message date. Date used: " . $date;
                $message = MessageDB::get_message($id);
                include("../views/update_message.php");
                unset($error);
                break;
            }
            if($id == NULL || $author == NULL || $subject == NULL || $text == NULL || $date == NULL || $id === FALSE || $author === FALSE || $subject === FALSE || $text === FALSE || $date === FALSE) {
                $error = "Invalid message data. Check all fields and try again.";
                include('../errors/error.php');
                break;
            } else {
                $message = MessageDB::update_message($id, $author, $text, $subject, $date);
                header("Location: ../controllers/managers_area_controller.php");
            }
        case"see_message_replies":
            $id = filter_input(INPUT_POST, 'message_id', FILTER_SANITIZE_SPECIAL_CHARS);
            $responses = null;
            $responses = ResponseDB::get_responses_from_message_id($id);
            $message = MessageDB::get_message($id);
            include("../views/message_respones.php");
            break;
        case"delete_response":
            $id = filter_input(INPUT_POST, 'response_id', FILTER_SANITIZE_SPECIAL_CHARS);
            ResponseDB::delete_response($id);
            header("Location: ../controllers/managers_area_controller.php");
            break;
        case'login_form':
            include("../views/manager_login.php");
            break;
        case"manager_login":                
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            if($username == NULL|| $username === FALSE || $password == NULL|| $password === FALSE) {
                $error = "Invalid login data. Check all fields and try again.";
                include("../views/manager_login.php");
                unset($error);
                break;
            } else {
                $isManager = AdminDB::is_admin($username, $password);
                if($isManager == true) {
                    $_SESSION["is_valid_admin"] = true;
                    $messages = MessageDB::get_messages();
                    include('../views/managers_area.php');
                } elseif ($isManager == false) {
                    $error = "Invalid login data. Check all fields and try again.";
                    include("../views/manager_login.php");
                    unset($error);
                } else {
                    $error = "Error in code. Not sure what happened sorry.";
                    include("../views/manager_login.php");
                    unset($error);
                }
            }
            break;
        case"logout":
            $_SESSION = array();
            session_destroy();
            include("../views/manager_login.php");
            break;
        default:
            echo($action);
            break;
    }
?>