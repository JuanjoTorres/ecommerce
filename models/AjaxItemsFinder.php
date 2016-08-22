<?php

	header("access-control-allow-origin: *");
	header("Content-Type: application/xml; charset=utf-8");
	$searching = utf8_decode($POST['searching']);
	$connection = new MySQLDataSource();
	$connection = connect('localhost', 'root', '', 'ecommerce');
	$query = "SELECT * FROM items WHERE name LIKE '" . $searching . "%' ORDER BY name;";
	$connection->execute_query($query);
	$row = $connection->next();

	echo "<?xml version='1.0' encouding='UTF-8' ?>";
	echo '<ITEMS>';

	while($row) {

		echo '<ITEM>';
		echo '<CODE>';
		echo utf8_encode($row->code);
		echo '</CODE>';
		echo '<NAME>';
		echo utf8_encode($row->name);
		echo '</NAME>';
		echo '<DESCRIPTION>';
		echo utf8_encode($row->description);
		echo '</DESCRIPTION>';
		echo '<PRICE>';
		echo utf8_encode($row->price);
		echo '</PRICE>';
		echo '<IMAGE>';
		echo utf8_encode($row->image);
		echo '</IMAGE>';
		echo '</ITEM>';
		
		$row = $connection->next();

	}

	echo '</ITEMS>';

?>