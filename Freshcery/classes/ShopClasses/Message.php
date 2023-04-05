<?php
    namespace ShopClasses;
    class Message {
        private $id;
        private $name;
        private $email;
        private $text;
        private $status;

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getText() {
            return $this->text;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setText($text) {
            $this->text = $text;
        }

        public function setStatus($status) {
            $this->status = $status;
        }
    }
?>