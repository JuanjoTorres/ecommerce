<?php

	session_start();

	include_once('../models/Item.php');
	include_once('../models/ItemData.php');
	include_once('../models/User.php');
	include_once('../models/UserData.php');
	include_once('../views/template-power.php');

	$showcase_tem = new TemplatePower("../views/pages/showcase.tpl");
	$showcase_tem->assignInclude('head', '../views/common/head.tpl');
	$showcase_tem->assignInclude('footer', '../views/common/footer.tpl');

	/**
	 * Si es un usuario anonimo:
	 *	- Se le redireccionara a la pagina "sign-in.php" para identificarse.
	 * Si es un  usuario registrado:
	 *  - Se le mostrara la gama de productos.
	 *  - Siendo usuario raso puede hacer lista de la compra.
	 *  - Solo si es administrador podra eliminar items.
	*/
	@$user = show_user($_SESSION['id_user']);
	$selection = isset($_SESSION['id_user'])? $user->getPermission() : 0;

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
			header("Location: sign-in.php");
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