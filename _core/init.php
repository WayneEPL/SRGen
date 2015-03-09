<?php

	ob_start();
	date_default_timezone_set('GMT');

	require 'settings-local.php';
	require 'database/db_connect.php';
	require 'functions/general.php';
	require 'functions/users.php';

	$current_page=explode('/',$_SERVER['SCRIPT_NAME']);
	$current_page=end($current_page);
?>