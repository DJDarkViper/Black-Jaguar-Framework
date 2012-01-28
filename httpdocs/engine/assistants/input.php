<?php
function request($key = null) {
	if($key == null) {
		foreach($_REQUEST as &$k) { $k = addslashes(trim($k)); }
		return (object) $_REQUEST;
	}
	return addslashes(trim($_REQUEST[$key]));
}
function post($key = null) {
	if($key == null) {
		foreach($_POST as &$k) { $k = addslashes(trim($k)); }
		return (object) $_POST;
	}
	return addslashes(trim($_POST[$key]));
}
function get($key = null) {
	if($key == null) {
		foreach($_GET as &$k) { $k = addslashes(trim($k)); }
		return (object) $_GET;
	}
	return addslashes(trim($_GET[$key]));
}