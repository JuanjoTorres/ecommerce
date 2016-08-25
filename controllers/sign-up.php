<?php 
	session_start();

	include_once('../models/User.php');
	include_once('../models/UserData.php');
	include_once('../views/template-power.php');

	$showcase_tem = new TemplatePower("../views/pages/sign-up.tpl");
	$showcase_tem->assignInclude('head', '../views/common/head.tpl');
	$showcase_tem->assignInclude('footer', '../views/common/footer.tpl');

	/**
	 * Si es un usuario anonimo:
	 *	- Se le dejara registrarse.
	 * Si es un  usuario registrado:
	 *  - Se le redireccionara a la pagina "sign-in.php" para identificarse. No tiene ninguna necesidad de volverse a registrar.
	*/
	@$user = show_user($_SESSION['id_user']);
	$selection = isset($_SESSION['id_user'])? $user->getPermission() : 0;

	if($selection > 0)
		header("Location: sign-in.php");

	$showcase_tem->assignInclude('menu', '../views/templates/menu-default.tpl');

	$showcase_tem->prepare();

	$showcase_tem->printToScreen();
	
?>