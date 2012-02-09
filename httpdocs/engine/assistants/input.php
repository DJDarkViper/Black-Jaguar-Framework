<?php
function request($key = null) {
	if($key == null) {
		foreach($_REQUEST as &$k) { $k = addslashes(trim($k)); }
		return (object) $_REQUEST;
	}
	if(isset($_REQUEST[$key]))
		return addslashes(trim($_REQUEST[$key]));
	else return false;
}
function post($key = null) {
	if($key == null) {
		foreach($_POST as &$k) { $k = addslashes(trim($k)); }
		return (object) $_POST;
	}
	if(isset($_REQUEST[$key]))
		return addslashes(trim($_POST[$key]));
	else return false;
}
function get($key = null) {
	if($key == null) {
		foreach($_GET as &$k) { $k = addslashes(trim($k)); }
		return (object) $_GET;
	}
	if(isset($_REQUEST[$key]))
		return addslashes(trim($_GET[$key]));
	else return false;
}