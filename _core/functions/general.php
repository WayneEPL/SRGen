<?php

/* 
===========================================================
					Generala Functions
===========================================================

Contains all the functions that does does not deal with 
particular system.
*/

function sanitize_message($string, $force_lowercase = false, $anal = false) {
/**
 * Returns a sanitized string, typically for URLs.
 *
 * Parameters:
 *     $string - The string to sanitize.
 *     $force_lowercase - Force the string to lowercase?
 *     $anal - If set to *true*, will remove all non-alphanumeric characters.
 */
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
                   "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                   "â€”", "â€“", ",", "<", ".", ">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
            mb_strtolower($clean, 'UTF-8') :
            strtolower($clean) :
        $clean;
}

function elliStr($s,$n) {
/**
*  Trims Paragraphs
*
* Returns paragraphs after trimming to prescribed length
*
**/
	for ( $x = 0; $x < strlen($s); $x++ ) {
		$o = ($n+$x >= strlen($s)? $s : ($s{$n+$x} == " "?
		substr($s,0,$n+$x) . "" : ""));
		if ( $o!= "" ) { return $o; }
	}
} 

function protected_page(){
	if(loggedin() == false){
		header('Location: protected.php');
		exit();
	}
}

function admin_protected(){
	  protected_page();
	  $user_data=user_data($_SESSION['user_id'],'type');
	 
	 if($user_data['type'] != '1'){
	  header("Location: protected.php?admin");
	 }
}

function logged_in_redirect(){
	if(loggedin() == true){
		header('Location: index.php');
		exit();
	}
}

function array_sanatize(&$item){
/*
	----------------------------------
	| Sanatize Function  : for arrays|
	----------------------------------

	Sanatizes the data sent as argument
*/	
	$item=htmlentities(mysql_real_escape_string($item));
}

function sanatize($data){

/*
	---------------------
	| Sanatize Function |
	---------------------

	Sanatizes the data sent as argument 
*/

	return mysql_real_escape_string($data);
}
	
function output_errors($errors, $class = "alert"){

/*
	---------------------
	|   Print Errors    |
	---------------------

	Prints error list in $error[] array 
*/

	echo '<div data-alert class="alert-box '.$class.'" >';
	
    if($class == "alert")
	   echo 'The following errors were encountered';

	echo '<ul><li>'.implode('</li><li>',$errors).'</li></ul>';
	echo '<a href="#" class="close">&times;</a>';
    echo '</div>';
}
?>