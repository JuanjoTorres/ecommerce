<?php
	class Item {

		private $code;
		private $name;
		private $description;
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

		function setDescription($description) {
			$this->description = $description;
		}
		function getDescription() {
			return $this->description;
		}

		function setPrice($price) {
			$this->price = $price;
		}
		function getPrice() {
			return $this->price;
		}

	}
?>