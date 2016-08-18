<?php
	class Order {

		private $idOrder;
		private $date;
		private $idCustomer;
		private $amount;

		function setIdOrder($idOrder) {
			$this->idOrder = $idOrder;
		}
		function getIdOrder() {
			return $this->idOrder;
		}

		function setDate($date) {
			$this->date = $date;
		}
		function getDate() {
			return $this->date;
		}

		function setIdCustomer($idCustomer) {
			$this->idCustomer = $idCustomer;
		}
		function getIdCustomer() {
			return $this->idCustomer;
		}

		function setAmount($amount) {
			$this->amount = $amount;
		}
		function getAmount() {
			return $this->amount;
		}

	}
?>