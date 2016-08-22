<?php

	session_start();

	include_once('../models/Item.php');
	include_once('../models/ItemData.php');
	include_once('../models/User.php');
	include_once('../models/UserData.php');
	include_once('../views/template-power.php');

	@$user = show_user($_SESSION['id_user']);
	$selection = isset($_SESSION['id_user'])? $user->getPermission() : 0;

	$showcase_tem = new TemplatePower("../views/pages/showcase.tpl");

	switch($selection) {

		case 1: 
			$showcase_tem->assignInclude('menu', '../views/templates/menu-user.tpl');
			$showcase_tem->assign('user_name', $user->getFirstName());
			break;
		case 2:
			$showcase_tem->assignInclude('menu', '../views/templates/menu-admin.tpl');
			$showcase_tem->assign('user_name', $user->getFirstName());
			break;
		default:
			$showcase_tem->assignInclude('menu', '../views/templates/menu-default.tpl');
			break;

	}

	$showcase_tem->prepare();

	// Array de objetos Item.
	$items = show_items();

	// Extrae la informacion de los objetos y los visualiza en cards.
	for($i = 0; $i < count($items); $i++) {

		$showcase_tem->newBlock('card', './views/templates/card.tpl');
		$showcase_tem->assign('card_image', $items[$i]->getImage());
		$showcase_tem->assign('card_name', $items[$i]->getName());
		$showcase_tem->assign('card_price', $items[$i]->getPrice());
		$showcase_tem->assign('card_description', $items[$i]->getDescription());

	}

	$showcase_tem->printToScreen();
	
?>