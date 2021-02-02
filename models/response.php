<?php
    class Response {
        public $id;
        public $text;
        public $name;
        public $studentId;
        public $date;
        public $messageID;

        public function __construct($id, $text, $name, $studentId, $date, $messageId) {
            $this->id = $id;
            $this->text = $text;
            $this->name = $name;
            $this->studentId = $studentId;
            $this->date = $date;
            $this->messageId = $messageId;
        }
    }
?>