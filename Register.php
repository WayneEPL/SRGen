<?php
	include '_core/init.php';

	if(empty($_POST)==false){
		$required_fields = array('username','password','name','email','register_no','admission_no','address','co_ordinator','head_of_division','hostel','branch','dob','doa','religion','cast','phone','admission_type');
		foreach($_POST as $key=> $value){
			if(empty($value) && in_array($key, $required_fields) == true){
				$errors[]="Fields marked in asterisk are required";
				break 1;
			}
		}
		if(empty($errors) == true){

			if(strlen($_POST['password']) < 5 ){
				$errors[]="your password must be atleast 5 characters ";
			}
			if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)=== false){
				$errors[]="Please enter a valid email address";
			}
			if(email_exist($_POST['email'])==true){
				$errors[]="Sorry the email is already in use";
			}
		}
	}


	include('_include/header.php'); 
	include('_include/register-form.php'); 
	include('_include/footer.php'); 
?>