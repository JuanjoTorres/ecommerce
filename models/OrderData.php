<?php
	
	include_once('MySQLDataSource.php');
	include_once('Order.php');

	/** -- Muestra todos los pedidos de un usuario
	 * parameter -> id_user: nombre clave del usuario {String}
	*/
	function show_orders_user($id_user) {

		$connection = new MySQLDataSource();
		$connection->connect('localhost', 'root', '', 'ecommerce');
		$query = "SELECT * FROM orders WHERE id_user='".$id_user."'";
		$connection->execute_query($query);
		$row = $connection->next();
		$i = 0;

		if(!$row) {

			$connection->disconnect();
			return false;

		} else {

			while($row) {

				$orders[$i] = new Order();
				$orders[$i]->setIdOrder($row->id_order);
				$orders[$i]->setDate($row->date);
				$orders[$i]->setIdCustomer($row->id_customer);
				$orders[$i]->setAmount($row->amount);
				$row = $connection->next();
				$i++;

			}

			$connection->disconnect();
			return $orders;

		}

	}

	/** -- Muestra todos los pedidos de la base de datos
	*/
	function show_orders() {

		$connection = new MySQLDataSource();
		$connection->connect('localhost', 'root', '', 'ecommerce');
		$query = "SELECT * FROM orders ORDER BY date;";
		$connection->execute_query($query);
		$row = $connection->next();
		$i = 0;

		if(!$row) {

			$connection->disconnect();
			return false;

		} else {

			while($row) {

				$orders[$i] = new Order();
				$orders[$i]->setIdOrder($row->id_order);
				$orders[$i]->setDate($row->date);
				$orders[$i]->setIdCustomer($row->id_customer);
				$orders[$i]->setAmount($row->amount);
				$row = $connection->next();
				$i++;

			}

			$connection->disconnect();
			return $orders;

		}
	}

	/** -- Inserta un pedido a la base de datos
	 * parameter -> id_customer: nombre clave del cliente {String}
	 * parameter -> amount: cantidad que se pago por el pedido {decimal}
	*/
	function insert_order($id_customer) {

		$date = date('Y/m/d H:i:s');
		$connection = new MySQLDataSource();
		$connection->connect('localhost', 'root', '', 'ecommerce');
		$query = "INSERT INTO orders (date, id_customer) VALUES ('".$date."', '".$id_customer."');";
		$isInserted = $connection->execute_query($query);

		if($isInserted) {

			$connection->disconnect();
			return false;

		} else {

			$connection->disconnect();
			return false;

		}

	}
	
?>