<?php 

include '../includes/theme-top.php';

require_once'../includes/users.php';
require_once'../includes/db.php';

if (user_is_signed_in()) {
	header('Location: index.php');
	exit;
}

$errors = array();
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = true;
	}
	
	if(empty($password)) {
		$errors['email'] = true;
	}
	
	if (empty($errors)) {
		$user = user_get($db, $email);
	
		
		if (!empty($user)) {
			if (password_match($password, $user['password'])) {
				user_sign_in($user['id']);
				header('Location: index.php');
				exit;
			
			}else{
				$errors['password-no-match'] = true;
			}
		}else{
			$errors['user-non-existent'] = true;
			
		}
		
		
		
	}
}


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign In</title>
<link href="../css/gardens.css" rel="stylesheet">
</head>

<body class="signin">

	<div class="adminwrapper">
		
		<div class="editwrap">

			<form method="post" action "sign-in.php">
			<div>
				<label for="email">E-mail Address</label><br>
				<input type="email" id="email" name="email" required>
			</div>
			<div>
				<label for="password">Password</label>
				<br>
				<div class="move"><input type="password" id="password" name="password" required></div>
				
			</div>
			<button type="submit">Sign In</button>
			<form>
			
			
		</div>
		<br><a href="../index.php">Home</a>
		
	</div>

<body>
</body>
</html>