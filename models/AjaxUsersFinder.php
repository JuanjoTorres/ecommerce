<?php

	include_once('MySQLDataSource.php');
	include_once('User.php');
	include_once('UserData.php');

	header("access-control-allow-origin: *");
	header("Content-Type: application/xml; charset=utf-8");

	$searching = utf8_decode($_POST['searching']);
	$connection = new MySQLDataSource();
	$connection->connect('localhost', 'root', '', 'ecommerce');
	$query = "SELECT * FROM users WHERE id_user LIKE '" . $searching . "%' ORDER BY id_user";
	$connection->execute_query($query);
	$row = $connection->next();
	$i = 0;

	echo "<?xml version='1.0' encoding='UTF-8' ?>";
	echo '<USERS>';

	while($row) {

		$users[$i] = new User();
		$users[$i]->setIdUser($row->id_user);
		$users[$i]->setPassword($row->password);
		$users[$i]->setFirstName($row->first_name);
		$users[$i]->setLastName($row->last_name);
		$users[$i]->setEmail($row->email);
		$users[$i]->setPermission($row->permission);

		echo '<USER>';
			echo '<IDUSER>';
			echo $users[$i]->getIdUser();
			echo '</IDUSER>';
			echo '<PASSWORD>';
			echo $users[$i]->getPassword();
			echo '</PASSWORD>';
			echo '<FIRSTNAME>';
			echo $users[$i]->getFirstName();
			echo '</FIRSTNAME>';
			echo '<LASTNAME>';
			echo $users[$i]->getLastName();
			echo '</LASTNAME>';
			echo '<EMAIL>';
			echo $users[$i]->getEmail();
			echo '</EMAIL>';
			echo '<PERMISSION>';
			echo $users[$i]->getPermission();
			echo '</PERMISSION>';
		echo '</USER>';
		
		$row = $connection->next();
		$i++;

	}

	echo '</USERS>';

?>