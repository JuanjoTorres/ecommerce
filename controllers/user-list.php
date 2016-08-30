<?php

	session_start();

	include_once('../models/User.php');
	include_once('../models/UserData.php');
	include_once('../views/template-power.php');

	$user_list_tem = new TemplatePower("../views/pages/user-list.tpl");
	$user_list_tem->assignInclude('head', '../views/common/head.tpl');
	$user_list_tem->assignInclude('menu', '../views/templates/menu-admin.tpl');
	$user_list_tem->assignInclude('alerts', '../views/templates/alerts.tpl');
	$user_list_tem->assignInclude('footer', '../views/common/footer.tpl');

	@$user = show_user($_SESSION['id_user']);
	$selection = isset($_SESSION['id_user'])? $user->getPermission() : 0;

	if($selection != 2)
		header("Location: showcase.php");

	$user_list_tem->prepare();
	$user_list_tem->newBlock('search_user');

	$users = show_users();

	for($i = 0; $i < count($users); $i++) {

		$user_list_tem->newBlock('user_row');
		$user_list_tem->assign('counter', $i);
		$user_list_tem->assign('id_user', $users[$i]->getIdUser());
		$user_list_tem->assign('password_user', $users[$i]->getPassword());
		$user_list_tem->assign('first_name_user', $users[$i]->getFirstName());
		$user_list_tem->assign('last_name_user', $users[$i]->getLastName());
		$user_list_tem->assign('email_user', $users[$i]->getEmail());
		$user_list_tem->assign('permission_user', $users[$i]->getPermission());

	}

	for($i = 0; $i < count($users); $i++) {
		if(isset($_POST[$users[$i]->getIdUser().'_modify'])) {

			$_SESSION['id_user_modify'] = $users[$i]->getIdUser();
			header("Location: user-profile.php");

		} else if(isset($_POST[$users[$i]->getIdUser()."_delete"])) {

			$isSaved = delete_user($users[$i]->getIdUser());

			if($isSaved)
				$user_list_tem->newBlock('success_delete');
			else
				$user_list_tem->newBlock('error_delete');

		} else if(isset($_POST[$users[$i]->getIdUser()."_change"])) {

			$isSaved = change_rol($users[$i]->getIdUser());

			if($isSaved)
				$user_list_tem->newBlock('success_change');
			else
				$user_list_tem->newBlock('error_change');
		}
	}

	$user_list_tem->printToScreen();

?>