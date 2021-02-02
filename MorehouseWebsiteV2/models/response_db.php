<?php
    class ResponseDB {
        public static function create_response($text, $name, $student_id, $message_id) {
            $db = DATABASE::getDB();
            $query = '  INSERT INTO responses 
                            (responseText, responseStudentName, responseStudentId, responseDate, messageID) 
                        VALUES 
                            (:text, :name, :student_id, NOW(), :message_id)';
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':text', $text);
                $statement->bindValue(':name', $name);
                $statement->bindValue(':student_id', $student_id);
                $statement->bindValue(':message_id', $message_id);
                $statement->execute();
                $statement->closeCursor();
            } catch (PDOException $e) {
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }
        public static function get_responses_from_message_id($id) {
            $db = DATABASE::getDB();
            $query = '  SELECT * FROM responses 
                        WHERE messageID = :id';
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':id', $id);
                $statement->execute();
                $rows = $statement->fetchAll();
                $statement->closeCursor();
                $responses = null;
                foreach ($rows as $row) {
                    $response = new Response($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
                    $responses[] = $response;
                }
                if($responses != null) {
                    return $responses;  
                } 
            } catch (PDOException $e) {
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }
        public static function delete_response($id) {
            $db = DATABASE::getDB();
            $query =   'DELETE FROM responses
                        WHERE responseId = :id';
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':id', $id);
                $statement->execute();
                $statement->closeCursor();
            } catch (PDOException $e) {
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }
    }
?>