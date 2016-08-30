<?php

	include_once('MySQLDataSource.php');
	include_once('Item.php');

	/** -- Muestra todos los items registrados en la base de datos
	*/
	function show_items() {

		$connection = new MySQLDataSource();
		$connection->connect('localhost', 'root', '', 'ecommerce');
		$query = "SELECT * FROM items;";
		$connection->execute_query($query);
		$row = $connection->next();
		$i = 0;

		if(!$row) {

			$connection->disconnect();
			return false;

		} else {

			while($row) {

				$items[$i] = new Item();
				$items[$i]->setCode($row->code);
				$items[$i]->setName($row->name);
				$items[$i]->setDescription($row->description);
				$items[$i]->setPrice($row->price);
				$items[$i]->setImage($row->image);
				$row = $connection->next();
				$i++;

			}

			$connection->disconnect();
			return $items;
			
		}

	}

	/** -- Insertar item en la base de datos
	 * parameter -> name: nombre del item {String}
	 * parameter -> description: descripcion del item {String}
	 * parameter -> price: precio que cuesta el item {decimal}
	 * parameter -> image: ruta de la imagen del item {String}
	*/
	function insert_item($name, $description, $price, $image) {

		$connection = new MySQLDataSource();
		$connection->connect('localhost', 'root', '', 'ecommerce');
		$image = "../public/img/".$image;
		$query = "INSERT INTO items (name, description, price, image) VALUES ('$name', '$description', $price, '$image');";
		$isInserted = $connection->execute_query($query);

		if($isInserted) {

			$connection->disconnect();
			return true;

		} else {

			$connection->disconnect();
			return false;

		}

	}

	/** -- Modifica un item de la base de datos
	 * parameter -> code: codigo del item {int}
	 * parameter -> name: nombre del item {String}
	 * parameter -> description: descripcion del item {String}
	 * parameter -> price: precio que cuesta el item {decimal}
	 * parameter -> image: ruta de la imagen del item {String}
	*/
	function modify_item($code, $name, $description, $price, $image) {

		$connection = new MySQLDataSource();
		$connection->connect('localhost', 'root', '', 'ecommerce');
		$query = "SELECT code FROM items WHERE code='".$code."';";
		$connection->execute_query($query);
		$row = $connection->next();

		if($row->code) {

			$image = "../public/img/".$image;
			$query = "UPDATE items SET name='$name', description='$description', price=$price, image='$image' WHERE code=$code;";
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

	/** -- Borra un item de la base de datos
	 * parameter -> code: codigo del item {int}
	*/
	function delete_item($code) {

		$connection = new MySQLDataSource();
		$connection->connect('localhost', 'root', '', 'ecommerce');
		$query = "SELECT code FROM items WHERE code='".$code."';";
		$connection->execute_query($query);
		$row = $connection->next();

		if($row->code) {

			$query = "DELETE FROM items WHERE code='".$code."';";
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
		
?>