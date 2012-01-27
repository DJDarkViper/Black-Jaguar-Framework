<?php
include($_SERVER['DOCUMENT_ROOT']."/config/manifest.php");


$uri = new uri();
if($uri->isempty()) {
	load::controller($Config->DefaultController);
	$controller = new $Config->DefaultController;
	$controller->index();
} else {
	$controller = null;
	if($uri->controller != null) {
		load::controller($uri->controller);
		$controller = new $uri->controller;
	}
	if($uri->method) {
		$controller->{$uri->method}( (( count($uri->arguments)>0 )? $uri->attributes() : null ) );
	} else {
		$controller->index();
	}
}
