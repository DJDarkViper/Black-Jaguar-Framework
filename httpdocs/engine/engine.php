<?php
/*************/

/**
* Include Manifest
*/
$autoload = new stdClass();

$includes = array(
		$ApplicationFolder."/config/config",
		$ApplicationFolder."/config/autoload",
		$EngineFolder."/plugins/load",
		$EngineFolder."/plguins/uri",
		$EngineFolder."/plguins/database"
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
if($uri->isempty()) {
	load::controller($Config->DefaultController);
	$controller = new $Config->DefaultController;
	$controller->index();
} else {
	$controller = null;
	if($uri->controller != null) {
		load::controller($uri->controller);
		$uri->controller = str_replace("-", "_", $uri->controller);
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
