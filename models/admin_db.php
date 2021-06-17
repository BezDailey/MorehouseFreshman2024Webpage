<?php
    class AdminDB {
        public static function create_admin($username, $password) {
            $db = DATABASE::getDB();
            $query = "  INSERT INTO administrators
                            (adminUsername, adminPassword)
                        VALUES
                            (:username, :password)";
            $hash = password_hash($password, PASSWORD_DEFAULT);
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(":username", $username);
                $statement->bindValue(":password", $hash);
                $statement->execute();
                $statement->closeCursor();
            } catch (PDOException $e) {
                $error= $e->getMessage();
                Database::display_db_error($error);
            }
        }

        public static function update_admin($id, $username, $password) {
            $db = DATABASE::getDB();
            $query = "  UPDATE administrators
                        SET adminUsername = :username,
                            adminPassowrd = :password
                        Where adminID = :id";
            $hash = password_hash($password, PASSWORD_DEFAULT);
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(":username", $username);
                $statement->bindValue(":password", $hash);
                $statement->binValue(":id", $id);
                $statement->execute();
                $statement->closeCursor();
            } catch(PDOException $e) {
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }

        public static function delete_admin($id) {
            $db = DATABASE::getDB();
            $query = "  DELETE FROM administrators
                        WHERE adminId = :id";
            try{
                $statement = $db->prepare($query);
                $statement->bindValue(':id', $id);
                $statement->execute();
                $statement->closeCursor();

            } catch (PDOException $e) {
                 $error = $e->getMessage();
                 Database::display_db_error($error);
            }
        }

        public static function get_admins() {
            $db = DATABASE::getDB();
            $query = "SELECT * FROM administrators";
            try {
                $statement = $db->prepare($query);
                $rows = $statement->fetchAll();
                $statement->closeCursor();
                $admins = null;
                foreach($rows as $row) {
                    $admin = new Admin($row[0], $row[1], $row[2]);
                    $admins[] = $admin;
                }
                return $admins;
            } catch(PDOException $e) {
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }

        public static function get_admin_by_id($id) {
            $db = DATABASE::getDB();
            $query = 'SELECT * FROM administrators WHERE adminID = :id';
            try {
                $statement = $db->prepare($query);
                $statement->execute();
                $row = $statement->fetch();
                $statement->closeCursor();
                $admin = new Admin($row[0], $row[1], $row[2]);
                return $admin;
            } catch (PDOException $e) {
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }

        public static function is_admin($username, $password) {
            $db = DATABASE::getDB();
            $query = "SELECT adminPassword FROM administrators WHERE adminUsername = :username";
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(":username", $username);
                $statement->execute();
                $row = $statement->fetch();
                $statement->closeCursor();
                $hash = $row['adminPassword'];
                return password_verify($password, $hash);
            } catch(PDOException $e) {
                $error = $e->getMessage();
                Database::display_db_error($error);
            }
        }
    }
?>