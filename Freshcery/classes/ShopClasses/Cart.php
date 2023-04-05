<?php
    namespace ShopClasses;
    class Cart {
        private $id;
        private $productId;
        private $productTitle;
        private $productImage;
        private $productQuantity;
        private $productPrice;
        private $productSubtotal;
        private $userid;
        private $createdAt;

        public function getId() {
            return $this->id;
        }

        public function getProductId() {
            return $this->productId;
        }

        public function getProductTitle() {
            return $this->productTitle;
        }

        public function getProductImage() {
            return $this->productImage;
        }

        public function getProductQuantity() {
            return $this->productQuantity;
        }

        public function getProductPrice() {
            return $this->productPrice;
        }

        public function getProductSubtotal() {
            return $this->productSubtotal;
        }

        public function getUserId() {
            return $this->userId;
        }

        public function getCreatedAt() {
            return $this->createdAt;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setProductId($productId) {
            $this->productId = $productId;
        }

        public function setProductTitle($productTitle) {
            $this->productTitle = $productTitle;
        }

        public function setProductImage($productImage) {
            $this->productImage = $productImage;
        }

        public function setProductQuantity($productQuantity) {
            $this->productQuantity = $productQuantity;
        }

        public function setProductPrice($price) {
            $this->productPrice = $price;
        }

        public function setProductSubtotal($productSubtotal) {
            $this->productSubtotal = $productSubtotal;
        }

        public function setUserId($userId) {
            $this->userId = $userId;
        }

        public function setCreatedAt($createdAt) {
            $this->createdAt = $createdAt;
        }

        public function getSubtotal() {
            return $this->productPrice * $this->productQuantity;
        }
    }


?>