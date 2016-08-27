<?php

	session_start();

	/**
	 * Si es un usuario anonimo:
	 *	- Se le dejara loguearse.
	 * Si es un  usuario registrado:
	 *  - Se le redireccionara a la pagina "showcase.php" para identificarse. No tiene necesidad de volverse a loguearse.
	*/
	if(isset($_SESSION['user']))
		header("Location: showcase.php");

	include_once('../models/User.php');
	include_once('../models/UserData.php');
	include_once('../views/template-power.php');

	$signin_tem = new TemplatePower("../views/pages/sign-in.tpl");
	$signin_tem->assignInclude('head', '../views/common/head.tpl');
	$signin_tem->assignInclude('alerts', '../views/templates/alerts.tpl');
	$signin_tem->assignInclude('footer', '../views/common/footer.tpl');
	$signin_tem->assignInclude('menu', '../views/templates/menu-default.tpl');

	$signin_tem->prepare();

	if(isset($_POST['sign-in']) && !empty($_POST['nickname']) && !empty($_POST['password'])) {
		
		$user = check_user($_POST['nickname'], md5($_POST['password']));

		if($user == false)
			$signin_tem->newBlock('user_error');
		else if($_POST['nickname'] == $user->getIdUser() && md5($_POST['password']) == $user->getPassword()) {

			$_SESSION['id_user'] = $user->getIdUser();
			header("Location: showcase.php");

		}

	}

	if(isset($_POST['sign-in']) && empty($_POST['nickname']))
		$signin_tem->newBlock('nickname_error');
	else if(isset($_POST['sign-in']) && empty ($_POST['password']))
		$signin_tem->newBlock('password_error_4');

	$signin_tem->printToScreen();
?>