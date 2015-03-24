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

		if(empty($errors) == true && isset($errors) == false){

			$register_data = array(
				'password'	 		=> $_POST['password'],
				'name'		 		=> $_POST['name'],
				'email' 	 		=> $_POST['email'],
				'username' 	 		=> $_POST['email'],
				'register_no'		=> $_POST['register_no'],
				'admission_no' 		=> $_POST['admission_no'],
				'address' 	 		=> $_POST['address'],
				'co_ordinator' 		=> $_POST['co_ordinator'],
				'head_of_division'  => $_POST['head_of_division'],
				'hostel'			=> $_POST['hostel'],
				'branch' 			=> $_POST['branch'],
				'dob'				=> $_POST['dob'],
				'doa'				=> $_POST['doa'],
				'religion'			=> $_POST['religion'],
				'cast'				=> $_POST['cast'],
				'phone'				=> $_POST['phone'],
				'admission_type'	=> $_POST['admission_type']
			);

			register_user($register_data);
		}
	}

	$title = "Registeration";
	include('_include/header.php'); 
	include('_include/register-form.php'); 
	include('_include/footer.php'); 
?>