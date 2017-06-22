<?php
	require 'autoloader.php';

	$is_user = User::validate($_POST['login']);

	echo $is_user;
?>
