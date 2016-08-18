<?php
	class User {

		private $idUser;
		private $password;
		private $firstName;
		private $lastName;
		private $email;
		private $permission;

		function setIdUser($idUser) {
			$this->idUser = $idUser;
		}
		function getIdUser() {
			return $this->idUser;
		}

		function setPassword($password) {
			$this->password = $password;
		}
		function getPassword() {
			return $this->password;
		}

		function setFirstName($firstName) {
			$this->firstName = $firstName;
		}
		function getFirstName() {
			return $this->firstName;
		}

		function setLastName($lastName) {
			$this->lastName = $lastName;
		}
		function getLastName() {
			return $this->lastName;
		}

		function setEmail($email) {
			$this->email = $email;
		}
		function getEmail() {
			return $this->email;
		}

		function setPermission($permission) {
			$this->permission = $permission;
		}
		function getPermission() {
			return $this->permission;
		}

	}
?>