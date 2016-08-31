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
			break;
		case 2:
			$showcase_tem->assignInclude('menu', '../views/templates/menu-admin.tpl');
				$showcase_tem->assignInclude('item_modal', '../views/templates/item-modal.tpl');
			$showcase_tem->assignInclude('alerts', '../views/templates/alerts.tpl');
			break;
		default:
			header("Location: sign-in.php");
			break;

	}

	$showcase_tem->prepare();
	$showcase_tem->newBlock('search_item');

	// Array de objetos Item.
	$items = show_items();

	switch($selection) {

		case 1:

			$showcase_tem->newBlock('btn_car');
			// Extrae la informacion de los objetos y los visualiza en cards.
			for($i = 0; $i < count($items); $i++) {

				$showcase_tem->newBlock('card');

				$showcase_tem->assign('card_image', $items[$i]->getImage());
				$showcase_tem->assign('card_name', $items[$i]->getName());
				$showcase_tem->assign('card_price', $items[$i]->getPrice());
				$showcase_tem->assign('card_description', $items[$i]->getDescription());
				$showcase_tem->newBlock('item_accept');
				$showcase_tem->assign('card_code', $items[$i]->getCode());

			}
			break;
		
		case 2:

			$showcase_tem->newBlock('btn_add_item');

			if($items == false)
				$showcase_tem->newBlock('orders_info');
			else {

				// Extrae la informacion de los objetos y los visualiza en cards.
				for($i = 0; $i < count($items); $i++) {

					$showcase_tem->newBlock('card');
					$showcase_tem->assign('card_image', $items[$i]->getImage());
					$showcase_tem->assign('card_name', $items[$i]->getName());
					$showcase_tem->assign('card_price', $items[$i]->getPrice());
					$showcase_tem->assign('card_description', $items[$i]->getDescription());
					$showcase_tem->newBlock('item_options');
					$showcase_tem->assign('id_item', $items[$i]->getCode());

				}

				for($i = 0; $i < count($items); $i++) {

					if(isset($_POST[$items[$i]->getCode()."_delete"])) {

						$isSaved = delete_item($items[$i]->getCode());

						if($isSaved)
							$showcase_tem->newBlock('success_delete');
						else
							$showcase_tem->newBlock('error_delete');

					}
					
				}

			}

			if(isset($_POST['item_accept'])) {

				if(!empty($_POST["is-in-there"])) {

					$isSaved = modify_item($_POST["is-in-there"],
					$_POST['item_name'], 
					$_POST['item_description'],
					$_POST['item_price'], 
					$_FILES['item_image']['name']);

					if($isSaved)
						$showcase_tem->newBlock('success_modification');
					else
						$showcase_tem->newBlock('error_modification');

				} else {

					$isSaved = insert_item(
					$_POST['item_name'], 
					$_POST['item_description'],
					$_POST['item_price'], 
					$_FILES['item_image']['name']);

					$dir_upload = '../public/img/';
					$file_uploaded = $dir_upload . basename($_FILES['item_image']['name']);
					move_uploaded_file($_FILES['item_image']['tmp_name'], $file_uploaded);

					if($isSaved)
						$showcase_tem->newBlock('success_add');
					else
						$showcase_tem->newBlock('error_add');

				}	

			}
			break;

	}

	$showcase_tem->printToScreen();
	
?>