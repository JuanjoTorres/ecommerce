<?php

	session_start();

	include_once('../models/User.php');
	include_once('../models/UserData.php');
	include_once('../models/Item.php');
	include_once('../models/ItemData.php');
	include_once('../models/Order.php');
	include_once('../models/OrderData.php');
	include_once('../views/template-power.php');

	$shop_list_tem = new TemplatePower("../views/pages/shopping-list.tpl");
	$shop_list_tem->assignInclude('head', '../views/common/head.tpl');
	$shop_list_tem->assignInclude('menu', '../views/templates/menu-user.tpl');
	$shop_list_tem->assignInclude('alerts', '../views/templates/alerts.tpl');
	$shop_list_tem->assignInclude('footer', '../views/common/footer.tpl');

	@$user = show_user($_SESSION['id_user']);
	$selection = isset($_SESSION['id_user'])? $user->getPermission() : 0;

	if($selection != 1)
		header("Location: showcase.php");

	$shop_list_tem->prepare();
	$shop_list_tem->newBlock('btn_buy');

	$valida = false;

	if(isset($_COOKIE['shop-list'])) {

		$cookieTMP = $_COOKIE['shop-list'];
		$cookieTMP = str_replace('+', '', $cookieTMP);

		if(strlen($cookieTMP) > 0) {

			$valida = true;

		}

	}

	if(!$valida || empty(trim($_COOKIE['shop-list'], ' '))) 
		$shop_list_tem->newBlock('orders_info');
	else {
		$intento = $_COOKIE['shop-list'];
		$intento = ltrim($intento, " ");
		$intento = rtrim($intento, " ");
		$codes_item = explode(" ", $intento);
		
		for($i = 0; $i < sizeof($codes_item); $i++) {

			$item = show_item($codes_item[$i]);

			$shop_list_tem->newBlock('item_row');
			$shop_list_tem->assign('image_item', $item->getImage());
			$shop_list_tem->assign('code_item', $item->getCode());
			$shop_list_tem->assign('name_item', $item->getName());
			$shop_list_tem->assign('price_item', $item->getPrice());

		}

	}

	if(isset($_POST['buy_order'])) {

		$isSaved = insert_order($user->getIdUser());

		if($isSaved)
			$shop_list_tem->newBlock('success_add');
		else
			$shop_list_tem->newBlock('success_add');

	}

	$shop_list_tem->printToScreen();

?>