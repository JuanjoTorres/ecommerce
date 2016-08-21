<?php

	include_once('MySQLDataSource.php');
	include_once('User.php');

	/* -- Devuelve información de un usuario en concreto 
	 * parameter -> user: nickname del usuario {String}
	 */
	function show_user($id_user) {

		$connection = new MySQLDataSource(); // Establecemos conexion.
		$connection->connect('localhost', 'root', '', 'ecommerce');
		$query = "SELECT * FROM users WHERE id_user='".$id_user."';";
		$connection->execute_query($query);
		$row = $connection->next();

		if(!$row) {

			$connection->disconnect();
			return false;

		} else {

			$user = new User();
			$user->setIdUser($row->id_user);
			$user->setPassword($row->password);
			$user->setFirstName($row->first_name);
			$user->setLastName($row->last_name);
			$user->setEmail($row->email);
			$user->setPermission($row->permission);

		}

		$connection->disconnect();
		return $user;

	}

?>