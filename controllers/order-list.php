<?php

	session_start();

	include_once('../models/Order.php');
	include_once('../models/OrderData.php');
	include_once('../models/User.php');
	include_once('../models/UserData.php');
	include_once('../views/template-power.php');

	$order_list_tem = new TemplatePower("../views/pages/order-list.tpl");
	$order_list_tem->assignInclude('head', '../views/common/head.tpl');
	$order_list_tem->assignInclude('menu', '../views/templates/menu-admin.tpl');
	$order_list_tem->assignInclude('alerts', '../views/templates/alerts.tpl');
	$order_list_tem->assignInclude('footer', '../views/common/footer.tpl');

	if(!isset($_SESSION['id_user']))
		header("Location: sign-in.php");

	$user = show_user($_SESSION['id_user']);
	$selection = $user->getPermission();

	switch($selection) {
		case 1:
			$order_list_tem->assignInclude('menu', "../views/templates/menu-user.tpl");

			break;
		
		case 2:
			$order_list_tem->assignInclude('menu', "../views/templates/menu-admin.tpl");
			break;
	}

	$order_list_tem->prepare();

	switch($selection) {
		case 1:
			$order_list_tem->assignInclude('menu', "../views/templates/menu-user.tpl");

			$orders = show_orders_user($user->getIdUser());
			
			if($orders == false)
				$order_list_tem->newBlock('orders_info');
			else {

				for($i = 0; $i < sizeOf($pedidos); $i++) {

					$order_list_tem->newBlock('order_row');
					$order_list_tem->assign('counter', $i);
					$order_list_tem->assign('date_order', $orders[$i]->getDate());
					$order_list_tem->assign('customer_order', $orders[$i]->getIdCustomer());

				}

			}

			break;
		
		case 2:
			$order_list_tem->assignInclude('menu', "../views/templates/menu-admin.tpl");
			$order_list_tem->newBlock('btn_showcase');

			$orders = show_orders();

			if($orders == false)
				$order_list_tem->newBlock('orders_info');
			else {

				for($i = 0; $i < sizeOf($orders); $i++) {

					$order_list_tem->newBlock('order_row');
					$order_list_tem->assign('counter', $i);
					$order_list_tem->assign('date_order', $orders[$i]->getDate());
					$order_list_tem->assign('customer_order', $orders[$i]->getIdCustomer());
					$order_list_tem->assign('amount_order', $orders[$i]->getAmount());

				}

			}
			break;
	}

	$order_list_tem->printToScreen();

?>