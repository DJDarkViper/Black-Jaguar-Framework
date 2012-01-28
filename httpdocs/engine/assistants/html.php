<?php
function inc($type, $file = null, $folder = null) {
	switch($type) {
		default:
		case "css":
			$folder = (( $folder == null ) ? "/css/" : $folder );
			echo "<link rel='stylesheet' type='text/css' href='".$folder.$file.".css' />";
			break;
		case "js":
			$folder = (( $folder == null ) ? "/scripts/" : $folder );
			echo "<script type='text/javascript' src='".$folder.$file.".js'></script>";
			break;
		case "jquery":
		case "jq":
			echo "<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>";
			break;
	}
}