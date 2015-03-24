<?php
	include '_core/init.php';

	if(isset($_POST['form']) == true){
		$form = $_POST['form'];
		echo "$form";
		$form_data = form_data($form);
		$register_data = array(
			'stu_id'	=> $session_user_id,
			'form_name'	=> $form_data['FORM_ADD'],
			'form_identifyer'	=>	$form_data['FORM_NAME']
		);
		register_form($register_data);
		header("Location:index.php");
	}
?>