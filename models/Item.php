<?php
	class Item {

		private $code;
		private $name;
		private $quantity;
		private $price;

		function setCode($code) {
			$this->code = $code;
		}
		function getCode($code) {
			return $this->code;
		}

		function setName($name) {
			$this->name = $name;
		}
		function getName($name) {
			return $this->name;
		}

		function setQuantity($quantity) {
			$this->quantity = $quantity;
		}
		function getQuantity($quantity) {
			return $this->quantity;
		}

		function setPrice($price) {
			$this->price = $price;
		}
		function getPrice($price) {
			return $this->price;
		}

	}
?>