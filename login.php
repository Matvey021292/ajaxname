<?php


	require 'autoloader.php';

	$login = isset($_POST) ? trim($_POST['login']) :'';

	$password = isset($_POST) ? trim($_POST['password']) :'';

	$name = isset($_POST) ? trim($_POST['name']) :'';

	$age = isset($_POST) ? trim($_POST['age']) :'';
	
	$user = new User($login,$password,$name,$age);

	$result = $user ->register();
	$result = $user ->validate();
	var_dump($result);
?>