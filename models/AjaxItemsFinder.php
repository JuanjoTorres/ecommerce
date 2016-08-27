<?php
	include_once('MySQLDataSource.php');
	include_once('Item.php');
	include_once('ItemData.php');

	header("access-control-allow-origin: *");
	header("Content-Type: application/xml; charset=utf-8");

	$searching = utf8_decode($_POST['searching']);
	$connection = new MySQLDataSource();
	$connection->connect('localhost', 'root', '', 'ecommerce');
	$query = "SELECT * FROM items WHERE name LIKE '" . $searching . "%' ORDER BY name";
	$connection->execute_query($query);
	$row = $connection->next();
	$i = 0;

	echo "<?xml version='1.0' encoding='UTF-8' ?>";
	echo '<ITEMS>';

	while($row) {

		$items[$i] = new Item();
		$items[$i]->setCode($row->code);
		$items[$i]->setName($row->name);
		$items[$i]->setDescription($row->description);
		$items[$i]->setPrice($row->price);
		$items[$i]->setImage($row->image);

		echo '<ITEM>';
			echo '<CODE>';
			echo $items[$i]->getCode();
			echo '</CODE>';
			echo '<NAME>';
			echo $items[$i]->getName();
			echo '</NAME>';
			echo '<DESCRIPTION>';
			echo $items[$i]->getDescription();
			echo '</DESCRIPTION>';
			echo '<PRICE>';
			echo $items[$i]->getPrice();
			echo '</PRICE>';
			echo '<IMAGE>';
			echo $items[$i]->getImage();
			echo '</IMAGE>';
		echo '</ITEM>';
		
		$row = $connection->next();
		$i++;

	}

	echo '</ITEMS>';

?>