<?php
    class AcademicCalendarDB {
        public static function get_events() {
            $db = DATABASE::getDB();
            $query = 'SELECT * FROM academic_calendar';
            try {
                $statement = $db->prepare($query);
                $statement->execute();
                $rows = $statement->fetchAll();
                $statement->closeCursor();  
                foreach ($rows as $row) {
                    $event = new Event($row[0], $row[1], $row[2]);
                    $events[] = $event;
                }
                return $events;           
            } catch (PDOException $e) {
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }
    }
?>