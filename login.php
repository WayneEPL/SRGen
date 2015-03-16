<?php
	include '_core/init.php';
	logged_in_redirect();
	if(empty($_POST) === false)	{
		$username=$_POST['username'];
		$password=$_POST['password'];		

		if(empty($username) == true || empty($password) == true){
			$errors[]= 'you need to enter an user name and pasword';
		} else if(user_exist($username)== false){
			$errors[]='we can\'t find the user.';
		} else if(user_active($username)== false){
			$errors[]='you have\'t activated.';
		}else{
			$users= login($username,$password);
			if($users== false){
				$errors[]='This user name password is incorrect.';
			}else {
				 $_SESSION['user_id']=$users;
				 header('Location: index.php');
				 exit();
			}
		}
 
	} else{
		$errors[]='No access';
	}
	if(empty($errors) == false):

		include('_include/header.php'); 
		include('_include/login-form.php'); 
		include('_include/footer.php'); 
	endif;
?>