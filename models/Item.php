<?php
	class Item {

		private $code;
		private $name;
		private $quantity;
		private $price;

		function setCode($code) {
			$this->code = $code;
		}
		function getCode() {
			return $this->code;
		}

		function setName($name) {
			$this->name = $name;
		}
		function getName() {
			return $this->name;
		}

		function setQuantity($quantity) {
			$this->quantity = $quantity;
		}
		function getQuantity() {
			return $this->quantity;
		}

		function setPrice($price) {
			$this->price = $price;
		}
		function getPrice() {
			return $this->price;
		}

	}
?>