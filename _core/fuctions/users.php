<?php 
function recover($mode ,$email){
	$mode = sanatize($mode);
	$email = sanatize($email);
	$user_data= user_data(user_id_from_email($email),'user_id','username','first_name');
	if($mode == 'username'){
		echo $user_data['username'];
		die();
	}else if($mode='password'){
		$generate_password=substr(md5(rand(999,999999)), 0 , 8);
		$qurey= "UPDATE `users` SET `password_recover` = '1' WHERE `users`.`user_id` =".$user_data['user_id'];
		mysql_query($qurey);
		echo "Hey ".$user_data['first_name']." is your password->". $generate_password;
		change_password($user_data['user_id'],$generate_password);
		die();
	}
}
function update_user($update_data,$user_id){
	$update = array();
	foreach($update_data as $field=>$data){
		$update[] ='`'.$field.'` = "'.$data.'"';
	}
	$qurey = "UPDATE `users` SET ".implode(',',$update)." WHERE `user_id`=".$user_id;
	mysql_query($qurey);
}
function change_password($user_id, $password){
	$user_id = (int)$user_id;
	$password=md5($password);
	$qurey="UPDATE users SET password ='$password' WHERE(user_id =$user_id)";
	mysql_query($qurey);	
}
function reset_flags($user_id,$option){
	if($option="change"){
	$qurey="UPDATE users SET password_recover=0 WHERE(user_id =$user_id)";
	mysql_query($qurey);
	}else {
	die();
	}
}
function register_user($register_data){
	array_walk($register_data,'array_sanatize');
	$register_data['password']=md5($register_data['password']);
	
	$fields ='`' . implode('`,`',array_keys($register_data)) . '`';
	$data = '\''.implode('\',\'',$register_data). '\'';
	
	$query="INSERT INTO `users` ($fields) VALUES($data)";
	mysql_query($query);
 
}
function user_data($user_id){
	$data = array();
	$user_id= (int)$user_id;
	$func_num_args = func_num_args(); 
	$func_get_args = func_get_args(); 
 	
	if($func_num_args>1){
		unset($func_get_args[0]);
		$fields ='`'.implode('`,`',$func_get_args).'`';
	}
	$data =mysql_fetch_assoc( mysql_query("SELECT * from users WHERE user_id='$user_id'"));
	return $data;
}
function loggedin(){
	return (isset($_SESSION['user_id']))? true : false;
}
function user_exist($username){
	$username = sanatize($username);
	$qurrey = mysql_query("select count(user_id) from users WHERE username = '$username' ");
	return (mysql_result($qurrey,0) == 1) ? true : false;
}
function user_exist_user_id($user_id){
	$user_id = sanatize($user_id);
	$qurrey = mysql_query("select count(user_id) from users WHERE user_id = '$user_id' ");
	return (mysql_result($qurrey,0) == 1) ? true : false;
}
function user_power($username){
	$username = sanatize($username);
	$qurrey = mysql_query("select count(username) from users WHERE power = 1 AND username='$username'");
	return (mysql_result($qurrey,0) == 1) ? true : false;
}
function user_access($user_id){
	$user_id = sanatize($user_id);
	$qurrey = mysql_query("SELECT `power` FROM `users` WHERE user_id = '$user_id'");
	return mysql_result($qurrey,0);
}
function email_exist( $mail){
	$mail = sanatize($mail);
	$qurrey = mysql_query("select count(email) from users WHERE email = '$mail' ");
	return (mysql_result($qurrey,0) == 1) ? true : false;
}
function count_user($option){			// counts number of user , parameres 0 for inactice and 1 for actice and 2 for all
	if($option == 0){
		$qurey='SELECT count(user_id) from users where status= 0';
	} else if($option == 1){
		$qurey='SELECT count(user_id) from users where status= 1';
	} else{
		$qurey='SELECT count(user_id) from users';
	}
	$result=mysql_result(mysql_query($qurey),0);
	return $result;
}
function user_power_abb($user_power){
	switch($user_power){
		case 1:
			$name="Administrator";
			break;
		case 0:
			$name="User";
			break;			
		default:
			$name="None";
	}
	return $name;
}
function user_active($username){
	$username = sanatize($username);
	$qurrey = mysql_query("select count(user_id) from users WHERE username = '$username' AND status=1 ");
	return (mysql_result($qurrey,0) == 1) ? true : false;
}
function user_active_user_id($user_id){
	$user_id = sanatize($user_id);
	$qurrey = mysql_query("select count(user_id) from users WHERE user_id = '$user_id' AND status=1 ");
	return (mysql_result($qurrey,0) == 1) ? true : false;
}
function user_id($username){
	$username = sanatize($username);
	return mysql_result(mysql_query("SELECT user_id from users WHERE username = '$username'"), 0, 'user_id');
}
function user_id_from_email($email){
	$email = sanatize($email);
	return mysql_result(mysql_query("SELECT user_id from users WHERE email = '$email'"), 0, 'user_id');
}
function user_namefrom_user_id($user_id){
	$user_id = sanatize($user_id);
	return mysql_result(mysql_query("SELECT username from users WHERE user_id = '$user_id'"), 0, 'username');
}
function first_name_from_user_id($user_id){
	$user_id = sanatize($user_id);
	return mysql_result(mysql_query("SELECT first_name from users WHERE user_id = '$user_id'"), 0, 'first_name');
}
function login($username, $password){
	$user_id = user_id($username);
	$username = sanatize($username);
	$password = md5($password);
	return (mysql_result(mysql_query("select count(user_id) from users WHERE username = '$username' AND password='$password'"), 0) == 1)? $user_id : false;
	
}
	
?>