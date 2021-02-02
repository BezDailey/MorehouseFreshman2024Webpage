<?php
    class Message {
        public $id;
        public $author;
        public $text;
        public $subject;
        public $date;

        public function __construct($id, $author, $text, $subject, $date) {
            $this->id = $id;
            $this->author = $author;
            $this->text = $text;
            $this->subject = $subject;
            $this->date = $date;
        }
    }
?>