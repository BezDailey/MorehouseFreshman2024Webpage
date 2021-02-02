<?php
    class MessageDB {
        public static function get_messages() {
            $db = DATABASE::getDB();
            $query = 'SELECT * FROM messages';
            try {
                $statement = $db->prepare($query);
                $statement->execute();
                $rows = $statement->fetchAll();
                $statement->closeCursor(); 
                $messages = null; 
                foreach ($rows as $row) {
                    $message = new Message($row[0], $row[1], $row[2], $row[3], $row[4]);
                    $messages[] = $message;
                }
                if($messages != null) {
                    return $messages;     
                }
       
            } catch (PDOException $e) {
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }
        public static function get_message($id) {
            $db = DATABASE::getDB();
            $query = 'SELECT * FROM messages WHERE messageID = :id';
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':id', $id);
                $statement->execute();
                $row = $statement->fetch();
                $statement->closeCursor();
                $message = new Message($row[0], $row[1], $row[2], $row[3], $row[4]);
                return $message;
            } catch (PDOException $e) {
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }
        public static function create_message($author, $text, $subject) {
            $db = DATABASE::getDB();
            $query = 'INSERT INTO messages (messageAuthor, messageText, messageSubject, messageDate) VALUES (:author, :text, :subject, NOW())';
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':author', $author);
                $statement->bindValue(':text', $text);
                $statement->bindValue(':subject', $subject);
                $statement->execute();
                $statement->closeCursor();
            } catch (PDOException $e) {
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }
        public static function update_message($id, $author, $text, $subject, $date) {
            $db = DATABASE::getDB();
            $query =   'UPDATE messages
                        SET messageAuthor = :author,
                            messageSubject = :subject,
                            messageDate = :date,
                            messageText = :text
                        WHERE messageID = :id';
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':author', $author);
                $statement->bindValue(':text', $text);
                $statement->bindValue(':subject', $subject);
                $statement->bindValue(':date', $date);
                $statement->bindValue(':id', $id);
                $statement->execute();
                $statement->closeCursor();
            } catch (PDOException $e) {
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }
        public static function delete_message($id) {
            $db = DATABASE::getDB();
            $query =   'DELETE FROM messages
                        WHERE messageID = :id';
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