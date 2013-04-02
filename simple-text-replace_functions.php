<?php

function is_regex($pattern){

	$old_error = error_reporting(0); // Turn off error reporting

	$match = preg_match($pattern, '');

	if ($match === false) {
		//$error = error_get_last();
		//echo $error["message"].'<br/>';
		$valid = false;
	}
	else{
		$valid = true;
	}

	error_reporting($old_error);  // Set error reporting to old level

	return $valid;
}

function fixPattern($pattern){
	return str_replace("\\\\", "\\", $pattern);
}

?>