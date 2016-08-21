<?php

	session_start();

	include_once('./models/Item.php');
	include_once('./models/ItemData.php');
	include_once('./models/User.php');
	include_once('./models/UserData.php');
	include_once('./templates/template-power.php');

	$user = show_user($_SESSION['id_user']);

	if($user->getPermission() == 0)
		header("Location: modal_sign-up_sign-in");

	$showcase_tem = new TemplatePower("./templates");
	// EN OBRAS...
?>