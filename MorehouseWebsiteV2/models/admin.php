<?php
    class Admin {
        public $id;
        public $username;
        public $password;

        public function __construct($id, $username, $password) {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
        }

    }
?>