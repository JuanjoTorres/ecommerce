<?php

	include_once('MySQLDataSource.php');
	include_once('User.php');

	/** -- Devuelve información de un usuario en concreto 
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

	/** -- Inserta un nuevo usuario a la base de datos
	 * parameter -> nickname: nombre clave del usuario {String}
	 * parameter -> password: contraseña para acceder a la cuenta {String} ENCODED
	 * parameter -> first_name: nombre del usuario {String}
	 * parameter -> last_name: apellidos del usuario {String}
	 * parameter -> email: correo electronico del usuario {String}
	 */
	function insert_user($nickname, $password, $first_name, $last_name, $email) {

		$connection = new MySQLDataSource();
		$connection->connect('localhost', 'root', '', 'ecommerce');
		$query = "INSERT INTO users (id_user, password, first_name, last_name, email) VALUES ('".$nickname."', '".md5($password)."', '".$first_name."', '".$last_name."', '".$email."')";

		if($connection->execute_query($query)) {

			$connection->disconnect();
			return true;

		} else {

			$connection->disconnect();
			return false;

		}

	}

	/** -- Verifica que la ID del usuario y la contraseña coinciden
	 * parameter -> nickname: nombre clave del usuario {String}
	 * parameter -> password: contraseña para acceder a la cuenta {String}
	*/
	function check_user($nickname, $password) {

		$connection = new MySQLDataSource();
		$connection->connect('localhost', 'root', '', 'ecommerce');
		$query = "SELECT id_user, password FROM users WHERE id_user='".$nickname."' AND password='".$password."'";
		$connection->execute_query($query);
		$row = $connection->next();
		if(!$row) {

			$connection->disconnect();
			return false;

		} else {

			$user = new User();
			$user->setIdUser($row->id_user);
			$user->setPassword($row->password);

			$connection->disconnect();
			return $user;

		}

	}
?>