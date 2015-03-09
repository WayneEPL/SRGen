<?php
	$connect_error="Sorry we\'ar experiencing down time";
	$connection=mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die($connect_error);
	mysql_select_db(DB_NAME)or die($connect_error); 
?>