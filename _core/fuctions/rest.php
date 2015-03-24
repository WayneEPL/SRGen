<?php
	
	function register_form($register_data){
		
		$fields ='`' . implode('`,`',array_keys($register_data)) . '`';
		$data = '\''.implode('\',\'',$register_data). '\'';
		
		$query="INSERT INTO `requests` ($fields) VALUES($data)";
	
		mysql_query($query);
	 
	}

	function form_data($form_id){
	$data = array();
	$form_id= (int)$form_id;


	$data =mysql_fetch_assoc( mysql_query("SELECT * from forms WHERE ID='$form_id'"));
	return $data;
}
?>