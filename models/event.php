<?php
    class Event {
        public $id;
        public $date;
        public $info;

        public function __construct($id, $date, $info) {
            $this->id = $id;
            $this->date = $date;
            $this->info = $info;
        }

        public function get_info() {
            $var = $this->info;
            print $var;
            return $var;
        }

        public function get_date() {
            return $this->date;
        }
    }
?>