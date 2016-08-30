<?php
	
	session_start();

	include_once("../models/User.php");
	include_once("../models/UserData.php");
	include_once("../views/template-power.php");

	if(!isset($_SESSION['id_user']))
		header("Location: sign-in.php");

	$profile_tem = new TemplatePower("../views/pages/user-profile.tpl");
	$profile_tem->assignInclude('head', "../views/common/head.tpl");
	$profile_tem->assignInclude('alerts', "../views/templates/alerts.tpl");
	$profile_tem->assignInclude('footer', "../views/common/footer.tpl");

	$user = show_user($_SESSION['id_user']);
	@$user_modify = show_user($_SESSION['id_user_modify']);
	$selection = $user->getPermission();

	switch ($selection) {
		case 1:
			$profile_tem->assignInclude('menu', "../views/templates/menu-user.tpl");
			break;
		
		case 2:
			$profile_tem->assignInclude('menu', "../views/templates/menu-admin.tpl");
			break;
	}

	$profile_tem->prepare();

	switch($selection) {

		case 1:
			$profile_tem->assign('user_first_name', $user->getFirstName());
			$profile_tem->assign('user_last_name', $user->getLastName());
			$profile_tem->assign('user_email', $user->getEmail());

			if(isset($_POST['user_accept'])) {

				if(empty($_POST['user_first_name']))
					$profile_tem->newBlock('first_name_error');
				else if(empty($_POST['user_last_name']))
					$profile_tem->newBlock('last_name_error');
				else if(empty($_POST['user_email']))
					$profile_tem->newBlock('email_error_2');
				else if(!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL))
					$profile_tem->newBlock('email_error_1');
				else {

					$isSaved = modify_user($user->getIdUser(), $_POST['user_first_name'], $_POST['user_last_name'], $_POST['user_email']);
					if($isSaved)
						$profile_tem->newBlock('success_modification');
					else
						$profile_tem->newBlock('error_modification');

				}

			}

			if(isset($_POST['password_accept'])) {

				if(empty($_POST['old_password']))
					$profile_tem->newBlock('password_old_error');
				else if(md5($_POST['old_password']) != $user->getPassword())
					$profile_tem->newBlock('password_error_1');
				else if(empty($_POST['new_password']))
					$profile_tem->newBlock('password_new_error');
				else if(empty($_POST['new_rpassword']))
					$profile_tem->newBlock('rpassword_new_error');
				else if($_POST['new_password'] != $_POST['new_rpassword'])
					$profile_tem->newBlock('password_error_1');
				else {

					$isSaved = modify_password($user->getIdUser(), $_POST['new_password']);
					if($isSaved)
						$profile_tem->newBlock('success_modification');
					else
						$profile_tem->newBlock('error_modification');

				}

			}

			if(isset($_POST['user_cancel']))
				header("Location: showcase.php");
			break;

		case 2:
			$profile_tem->assign('user_first_name', $user_modify->getFirstName());
			$profile_tem->assign('user_last_name', $user_modify->getLastName());
			$profile_tem->assign('user_email', $user_modify->getEmail());

			if(isset($_POST['user_accept'])) {

				if(empty($_POST['user_first_name']))
					$profile_tem->newBlock('first_name_error');
				else if(empty($_POST['user_last_name']))
					$profile_tem->newBlock('last_name_error');
				else if(empty($_POST['user_email']))
					$profile_tem->newBlock('email_error_2');
				else if(!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL))
					$profile_tem->newBlock('email_error_1');
				else {

					$isSaved = modify_user($$user_modify->getIdUser(), $_POST['user_first_name'], $_POST['user_last_name'], $_POST['user_email']);
					if($isSaved)
						$profile_tem->newBlock('success_modification');
					else
						$profile_tem->newBlock('error_modification');

				}

			}

			if(isset($_POST['password_accept'])) {

				if(empty($_POST['old_password']))
					$profile_tem->newBlock('password_old_error');
				else if(md5($_POST['old_password']) != $user_modify->getPassword())
					$profile_tem->newBlock('password_error_1');
				else if(empty($_POST['new_password']))
					$profile_tem->newBlock('password_new_error');
				else if(empty($_POST['new_rpassword']))
					$profile_tem->newBlock('rpassword_new_error');
				else if($_POST['new_password'] != $_POST['new_rpassword'])
					$profile_tem->newBlock('password_error_1');
				else {

					$isSaved = modify_password($user_modify->getIdUser(), $_POST['new_password']);
					if($isSaved)
						$profile_tem->newBlock('success_modification');
					else
						$profile_tem->newBlock('error_modification');

				}

			}

			if(isset($_POST['user_cancel']))
				header("Location: user-list.php");
			break;
	}

	$profile_tem->printToScreen();

?>