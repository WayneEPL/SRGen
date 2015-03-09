<?php

/* 
===========================================================
					User Functions
===========================================================

Contains all the functions that deals with user accounts

*/

function email_confirm_id($confirmid){
	$confirmid = sanatize($confirmid);
	$qurrey = mysql_query("SELECT count(email) FROM ".USERS_TABLE." WHERE email_status = '$confirmid' ");
	return (mysql_result($qurrey,0) == 1) ? true : false;
}

function reset_password($email){
	$user_data = user_data($email,'email');
	$password_key = md5(($user_data['password']*time()) * rand(5, 15));
	$update_data = array(
		'password_key' => $password_key
	);
	update_user($update_data,$user_data['user_id']);
	
	password_reset_email($user_data['user_id']);
	$_SESSION['password_reset'] = 1;
	
}

function password_key_email_match($password_key,$email){
	$password_key = sanatize($password_key);
	$email = sanatize($email);
	$qurrey = mysql_query("select count(email) from ".USERS_TABLE." WHERE password_key = '$password_key' AND  email = '$email' ");
	return (mysql_result($qurrey,0) == 1) ? true : false;
}

function password_key_exist($password_key){
	$password_key = sanatize($password_key);
	$qurrey = mysql_query("select count(email) from ".USERS_TABLE." WHERE password_key = '$password_key' ");
	return (mysql_result($qurrey,0) == 1) ? true : false;
}

function update_user($update_data,$user_id){
	$user_id= (int)$user_id;
	$update = array();
	foreach($update_data as $field=>$data){
		$update[] ='`'.$field.'` = "'.$data.'"';
	}
	$qurey = "UPDATE `".USERS_TABLE."` SET ".implode(',',$update)." WHERE `user_id`=".$user_id;
	mysql_query($qurey);
}

function login($email, $password){
	$email = sanatize($email);
	$password = md5($password);
	$user_data = user_data($email,"email");

	$query = "SELECT count(user_id) from ".USERS_TABLE." WHERE email = '$email' AND password='$password'";

	return (mysql_result(mysql_query($query), 0) == 1)? $user_data['user_id'] : false;
}

function user_data($data,$key = "user_id"){
	$data = sanatize($data);
	$key = sanatize($key);
	$query = "SELECT * from ".USERS_TABLE." WHERE $key ='$data'";
	$data =mysql_fetch_assoc( mysql_query($query));
	return $data;
}

function user_exist($data,$key = "email"){
	$data = sanatize($data);
	$key = sanatize($key);
	$query = "select count(user_id) from ".USERS_TABLE." WHERE $key ='$data' ";
	$qurrey = mysql_query($query);
	return (mysql_result($qurrey,0) == 1) ? true : false;
}

function register_user($register_data){
	array_walk($register_data,'array_sanatize');
	$register_data['password']=md5($register_data['password']);
	
	$fields ='`' . implode('`,`',array_keys($register_data)) . '`';
	$data = '\''.implode('\',\'',$register_data). '\'';
	
	$query="INSERT INTO ".USERS_TABLE." ($fields) VALUES($data)";
	mysql_query($query);
 
}


function email_exist($mail){
	$mail = sanatize($mail);
	$qurrey = mysql_query("select count(email) from ".USERS_TABLE." WHERE email = '$mail' ");
	return (mysql_result($qurrey,0) == 1) ? true : false;
}


function loggedin(){
	return (isset($_SESSION['user_id']) && isset($_SESSION['site_id']))? true : false;
}

function log_user_in($user_id){
	$user_id = sanatize($user_id);
	$_SESSION['user_id'] = $user_id;
	$time = date("Y-m-d  H:i:s");
	$qurey = "UPDATE ".USERS_TABLE." SET last_activity = '$time' WHERE `user_id`=".$user_id;
	mysql_query($qurey);

	set_default_site($user_id);
}

?>