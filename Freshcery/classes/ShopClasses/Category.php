<?php
    namespace ShopClasses;
    class Category {
        private $id;
        private $name;
        private $image;
        private $icon;
        private $description;
        private $createdAt;

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getImage() {
            return $this->image;
        }

        public function getIcon() {
            return $this->icon;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getCreatedAt() {
            return $this->createdAt;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setImage($image) {
            $this->image = $image;
        }

        public function setIcon($icon) {
            $this->icon = $icon;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function setCreatedAt($createdAt) {
            $this->createdAt = $createdAt;
        }
    }

?>