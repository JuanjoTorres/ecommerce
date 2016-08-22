<?php

	include_once('MySQLDataSource.php');
	include_once('Item.php');

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
		
?>