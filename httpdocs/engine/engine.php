<?php
/*************/

/**
* Include Manifest
*/
$autoload = new stdClass();
$route = array();

$includes = array(
		$ApplicationFolder."/config/config",
		$ApplicationFolder."/config/autoload",
		$ApplicationFolder."/config/router",
		$EngineFolder."/plugins/load",
		$EngineFolder."/plugins/uri",
		$EngineFolder."/plugins/database"
);
// Loads the includes
foreach($includes as $inc) {
	include($_SERVER['DOCUMENT_ROOT'].$inc.".php");
}



// Required Plugins
//$autoload->Plugins[] = "uri";
//$autoload->Plugins[] = "database";

// Autoload
foreach($autoload as $type=>$list) {
	if(!empty($list)) {
		switch($type) {
			case "Models":
				$load = "model";
				break;
			case "Assistants":
				$load = "assistant";
				break;
			case "Plugins":
				$load = "plugin";
				break;
		}
		
		foreach($list as $item) {
			load::$load($item);
		}
	}
}

$uri = new uri();

// need to setup router here
foreach($route as $routeFrom=>$routeTo) {
	$routeFrom = explode("/", $routeFrom);
	$routeTo = explode("/", $routeTo);
	if(!$uri->isempty()) {
		if($uri->controller == $routeFrom[0]) {
			$uri->controller = $routeTo[0];
			if($uri->method != null && isset($routeFrom[1]) && $uri->method == $routeFrom[1]) { // routed controller exists
				$uri->method = $routeTo[1];
			}
		}
	}
}


if($uri->isempty()) {
	load::controller($Config->DefaultController);
	$controller = new $Config->DefaultController;
	$controller->index();
} else {
	$controller = null;
	if($uri->controller != null) {
		$uri->controller = str_replace("-", "_", $uri->controller);
		load::controller($uri->controller);
		$controller = new $uri->controller;
	}
	if($uri->method) {
		$uri->method = str_replace("-", "_", $uri->method);
		if(method_exists($controller, $uri->method)) {
			$controller->{$uri->method}( (( count($uri->arguments)>0 )? $uri->attributes() : null ) );
		} else {
			array_unshift($uri->arguments, $uri->method);
			$controller->index( (( count($uri->arguments)>0 )? $uri->attributes() : null ) );
		}
	} else {
		$controller->index();
	}
}
