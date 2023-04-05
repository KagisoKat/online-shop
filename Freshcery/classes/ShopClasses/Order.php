<?php
    namespace ShopClasses;
    class Order {
        private $id;
        private $name;
        private $lastName;
        private $companyName;
        private $address;
        private $city;
        private $country;
        private $zipCode;
        private $email;
        private $phoneNumber;
        private $orderNotes;
        private $status;
        private $price;
        private $userId;
        private $createdAt;

        public function getId() {
			return $this->id;
		}
 
        public function getName() {
			return $this->name;
		}
 
        public function getLastName() {
			return $this->lastName;
		}
 
        public function getCompanyName() {
			return $this->companyName;
		}
 
        public function getAddress() {
			return $this->address;
		}
 
        public function getCity() {
			return $this->city;
		}
 
        public function getCountry() {
			return $this->country;
		}
 
        public function getZipCode() {
			return $this->zipCode;
		}
 
        public function getEmail() {
			return $this->email;
		}
 
        public function getPhoneNumber() {
			return $this->phoneNumber;
		}
 
        public function getOrderNotes() {
			return $this->orderNotes;
		}
 
        public function getStatus() {
			return $this->status;
		}
 
        public function getPrice() {
			return $this->price;
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
 
        public function setName($name) {
			$this->name = $name;
		}
 
        public function setLastName($lastName) {
			$this->lastName = $lastName;
		}
 
        public function setCompanyName($companyName) {
			$this->companyName = $companyName;
		}
 
        public function setAddress($address) {
			$this->address = $address;
		}
 
        public function setCity($city) {
			$this->city = $city;
		}
 
        public function setCountry($country) {
			$this->country = $country;
		}
 
        public function setZipCode($zipCode) {
			$this->zipCode = $zipCode;
		}
 
        public function setEmail($email) {
			$this->email = $email;
		}
 
        public function setPhoneNumber($phoneNumber) {
			$this->phoneNumber = $phoneNumber;
		}
 
        public function setOrderNotes($orderNotes) {
			$this->orderNotes = $orderNotes;
		}
 
        public function setStatus($status) {
			$this->status = $status;
		}
 
        public function setPrice($price) {
			$this->price = $price;
		}
 
        public function setUserId($userId) {
			$this->userId = $userId;
		}
 
        public function setCreatedAt($createdAt) {
			$this->createdAt = $createdAt;
		}
    }

?>