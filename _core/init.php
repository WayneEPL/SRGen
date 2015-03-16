<?php 
	ob_start();
	session_start();
	date_default_timezone_set('Asia/Kolkata');	
	require 'settings-local.php';	
	require 'database/db_connect.php';
	require 'fuctions/users.php';
	require 'fuctions/general.php';	
	
	$current_page=explode('/',$_SERVER['SCRIPT_NAME']);
	$current_page=end($current_page);
	if(loggedin()== true){
		$session_user_id = $_SESSION['user_id'];
		$user_data= user_data($session_user_id);
		if(user_active($user_data['username'])=== false){
			session_destroy();
			 header('Location: index.php');
			 exit();
		}
		if($current_page != "Change-Password.php" && $current_page!= "logout.php" && $user_data['password_recover']== 1){
			header('Location: Change-Password.php?force');
			
		}
	}
?>