<?php

	include_once('MySQLDataSource.php');
	include_once('User.php');

	/** -- Recopila todos los datos utiles de todos los usuarios de la base
	*/
	function show_users() {

		$connection = new MySQLDataSource();
		$connection->connect('localhost', 'root', '', 'ecommerce');
		$query = "SELECT * FROM users;";
		$connection->execute_query($query);
		$row = $connection->next();
		$i = 0;

		if(!$row) {

			$connection->disconnect();
			return false;

		} else {

			while($row) {

				$users[$i] = new User();
				$users[$i]->setIdUser($row->id_user);
				$users[$i]->setPassword($row->password);
				$users[$i]->setFirstName($row->first_name);
				$users[$i]->setLastName($row->last_name);
				$users[$i]->setEmail($row->email);
				$users[$i]->setPermission($row->permission);

				$row = $connection->next();
				$i++;

			}

			$connection->disconnect();
			return $users;
		}

	}

	/** -- Devuelve información de un usuario en concreto 
	 * parameter -> id_user: nickname del usuario {String}
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

	/** -- Modifica los datos de un usuario
	 * parameter -> id_user: nombre clave del usuario {String}
	 * parameter -> first_name: nombre del usuario {String}
	 * parameter -> last_name: apellidos del usuario {String}
	 * parameter -> email: correo electronico del usuario {String}
	*/
	function modify_user($id_user, $first_name, $last_name, $email) {
		$connection = new MySQLDataSource();
		$connection->connect('localhost', 'root', '', 'ecommerce');
		$query = "UPDATE users SET first_name='".$first_name."', last_name='".$last_name."', email='".$email."' WHERE id_user='".$id_user."';";

		if($connection->execute_query($query)) {

			$connection->disconnect();
			return true;

		} else {

			$connection->disconnect();
			return false;

		}

	}

	/** -- Modifica la contraseña en concreto de un usuario
	 * parameter -> id_user: nombre en clave del usuario {String}
	 * parameter -> password: contraseña del usuario {String} ENCODED
	*/
	function modify_password($id_user, $password) {

		$connection = new MySQLDataSource();
		$connection->connect('localhost', 'root', '', 'ecommerce');
		$query = "UPDATE users SET password='".md5($password)."' WHERE id_user='".$id_user."';";

		if($connection->execute_query($query)) {

			$connection->disconnect();
			return true;

		} else {

			$connection->disconnect();
			return false;
		}
	}

	/** -- Elimina a un usuario seleccionado
	 * parameter -> id_user: nombre clave del usuario {String}
	*/
	function delete_user($id_user) {

		$connection = new MySQLDataSource();
		$connection->connect('localhost', 'root', '', 'ecommerce');
		$query = "SELECT id_user FROM users WHERE id_user='".$id_user."';";
		$connection->execute_query($query);
		$row = $connection->next();

		if($row->id_user) {

			$query = "DELETE FROM users WHERE id_user='".$id_user."';";
			$isInserted = $connection->execute_query($query);

			if($isInserted) {

				$connection->disconnect();
				return true;

			} else {

				$connection->disconnect();
				return false;

			}

		} else {

			$connection->disconnect();
			return false;

		}

	}

	/** -- Cambia los permisos a un usuario. Puede pasar de ser usuario raso a administrador
	 * parameter -> id_user: nombre clave del usuario {String}
	*/
	function change_rol($id_user) {

		$connection = new MySQLDataSource();
		$connection->connect('localhost', 'root', '', 'ecommerce');
		$query = "SELECT id_user, permission FROM users WHERE id_user='".$id_user."';";
		$connection->execute_query($query);
		$row = $connection->next();

		if($row->id_user) {

			if($row->permission == 1) {
				
				$query = "UPDATE users SET permission=2 WHERE id_user='".$id_user."';";
				$isInserted = $connection->execute_query($query);

				if($isInserted) {

					$connection->disconnect();
					return true;

				} else {

					$connection->disconnect();
					return false;

				}

			} else {

				$query = "UPDATE users SET permission=1 WHERE id_user='".$id_user."';";
				$isInserted = $connection->execute_query($query);

				if($isInserted) {

					$connection->disconnect();
					return true;

				} else {

					$connection->disconnect();
					return false;

				}

			}

		} else {

			$connection->disconnect();
			return false;

		}

	}

?>