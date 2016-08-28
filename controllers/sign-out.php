<?php

	session_start();

	if(!isset($_SESSION['id_usuario']))
		header("Location: sign-in.php");

	setcookie(session_name(), "", time() -1);
	session_destroy();
	
	header("Location: sign-in.php");
?>