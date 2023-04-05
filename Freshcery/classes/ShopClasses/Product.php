<?php
    namespace ShopClasses;
    class Product {
        private $id;
        private $title;
        private $description;
        private $price;
        private $quantity;
        private $image;
        private $expDate;
        private $categoryId;
        private $status;
        private $createdAt;

        public function getId() {
            return $this->id;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getPrice() {
            return $this->price;
        }

        public function getQuantity() {
            return $this->quantity;
        }

        public function getimage() {
            return $this->image;
        }

        public function getExpDate() {
            return $this->expDate;
        }

        public function getCategoryId() {
            return $this->categoryId;
        }

        public function getStatus() {
            return $this->status;
        }

        public function getCreatedAt() {
            return $this->createdAt;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setTitle($title) {
            $this->title = $title;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function setPrice($price) {
            $this->price = $price;
        }

        public function setQuantity($quantity) {
            $this->quantity = $quantity;
        }

        public function setimage($image) {
            $this->image = $image;
        }

        public function setExpDate($expDate) {
            $this->expDate = $expDate;
        }

        public function setCategoryId($categoryId) {
            $this->categoryId = $categoryId;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function setCreatedAt($createdAt) {
            $this->createdAt = $createdAt;
        }

    }
?>