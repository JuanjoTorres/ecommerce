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
		function getIdUser($idUser) {
			return $this->idUser;
		}

		function setPassword($password) {
			$this->password = $password;
		}
		function getPassword($password) {
			return $this->password;
		}

		function setFirstName($firstName) {
			$this->firstName = $firstName;
		}
		function getFirstName($firstName) {
			return $this->firstName;
		}

		function setLastName($lastName) {
			$this->lastName = $lastName;
		}
		function getLastName($lastName) {
			return $this->lastName;
		}

		function setEmail($email) {
			$this->email = $email;
		}
		function getEmail($email) {
			return $this->email;
		}

		function setPermission($permission) {
			$this->permission = $permission;
		}
		function getPermission($permission) {
			return $this->permission;
		}

	}
?>