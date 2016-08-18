<?php
	class Order {

		private $idOrder;
		private $date;
		private $idCustomer;
		private $amount;

		function setIdOrder($idOrder) {
			$this->idOrder = $idOrder;
		}
		function getIdOrder($idOrder) {
			return $this->idOrder;
		}

		function setDate($date) {
			$this->date = $date;
		}
		function getDate($date) {
			return $this->date;
		}

		function setIdCustomer($idCustomer) {
			$this->idCustomer = $idCustomer;
		}
		function getIdCustomer($idCustomer) {
			return $this->idCustomer;
		}

		function setAmount($amount) {
			$this->amount = $amount;
		}
		function getAmount($amount) {
			return $this->amount;
		}

	}
?>