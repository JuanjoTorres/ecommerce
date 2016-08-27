<?php 
	session_start();

	/**
	 * Si es un usuario anonimo:
	 *	- Se le dejara registrarse.
	 * Si es un  usuario registrado:
	 *  - Se le redireccionara a la pagina "showcase.php" para identificarse. No tiene necesidad de volverse a registrar.
	*/
	if(isset($_SESSION['user']))
		header("Location: showcase.php");

	include_once('../models/User.php');
	include_once('../models/UserData.php');
	include_once('../views/template-power.php');

	$signup_tem = new TemplatePower("../views/pages/sign-up.tpl");
	$signup_tem->assignInclude('head', '../views/common/head.tpl');
	$signup_tem->assignInclude('alerts', '../views/templates/alerts.tpl');
	$signup_tem->assignInclude('footer', '../views/common/footer.tpl');
	$signup_tem->assignInclude('menu', '../views/templates/menu-default.tpl');

	$signup_tem->prepare();

	// Array que comprueba que todos los campos esten correctamente validados.
	$isChecked = array(

		"nickname" => false,
		"password" => false,
		"first-name" => false,
		"last-name" => false,
		"email" => false,

	);

	if(isset($_POST['sign-up'])) {

		// Chequear el nickname.
		if(!empty($_POST['nickname']))
			$isChecked['nickname'] = true;
		else
			$signup_tem->newBlock('nickname_error');

		// Chequear la contraseña y la recontraseña.
		if(!empty($_POST['password']) && !empty($_POST['rpassword']) && strlen($_POST['password']) > 5) {

			$upper = '/[A-Z]/';
			$lower = '/[a-z]/';

			if(preg_match($upper, $_POST['password']) && preg_match($lower, $_POST['password'])) {

				if($_POST['password'] == $_POST['rpassword'])
					$isChecked["password"] = true;
					
				else
					$signup_tem->newBlock('password_error_1');	

			} else
				$signup_tem->newBlock('password_error_2');

		} else
			$signup_tem->newBlock('password_error_3');

		// Chequear el nombre.
		if(!empty($_POST['first_name']))
			$isChecked['first-name'] = true;
		else
			$signup_tem->newBlock('first_name_error');

		// Chequear los apellidos.
		if(!empty($_POST['last_name']))
			$isChecked['last-name'] = true;
		else
			$signup_tem->newBlock('last_name_error');

		// Chequear el email.
		if(!empty($_POST['email'])) {

			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
				$isChecked['email'] = true;
			else
				$signup_tem->newBlock('email_error_1');

		} else
			$signup_tem->newBlock('email_error_2');

		// Si todo esta correcto...
		if($isChecked['nickname'] == true 
			&& $isChecked['password'] == true 
			&& $isChecked['first-name'] == true 
			&& $isChecked['last-name'] == true 
			&& $isChecked['email'] == true) {

			$isSignedUp = insert_user($_POST['nickname'], 
				$_POST['password'], 
				$_POST['first_name'], 
				$_POST['last_name'], 
				$_POST['email']);

			if($isSignedUp)
				$signup_tem->newBlock('user_success');
			else
				$signup_tem->newBlock('user_error');

		}

	}

	$signup_tem->printToScreen();
	
?>