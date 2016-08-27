<?php
	class MySQLDataSource {

		private $connection;
		private $querys;
		private $dev;

		function connect($host, $user, $pass, $base) {

			$this->connection = mysqli_connect($host, $user, $pass) or die("ERROR");
			mysqli_select_db($this->connection, $base);
			mysqli_set_charset($this->connection, "utf8");

		}

		function disconnect() {

			mysqli_close($this->connection);
		}

		function execute_query($query) {

			$this->querys = mysqli_query($this->connection, $query);
			return $this->querys;

		}

		function next() {

			$this->dev = mysqli_fetch_object($this->querys);
			return $this->dev;

		}

		// Arreglar mas adelante...
		function mensajeError() {
		}

		// Arreglar mas adelante...
		private function RegError() {
		}
		
	}
?>