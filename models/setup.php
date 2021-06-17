<?php
        require_once('../models/database.php');
        require_once("../models/event.php");
        require_once("../models/message.php");
        require_once("../models/response.php");
        require_once("../models/academic_calendar_db.php");
        require_once("../models/message_db.php");
        require_once("../models/response_db.php");
        require_once("../models/admin_db.php");

        AdminDB::create_admin("admin", "morehouse");
?>