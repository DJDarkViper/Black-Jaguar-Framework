<?php
$Config = new stdClass();

/* Base Configurations */

$Config->DefaultController = "main";

/*
 * The arrays listed below are the main directory search configurations. 
 * You are free to add more, the order matters (top obviusly higher priority) 
 */

$Config->Controllers = array(
		"controllers/"
);
$Config->Models = array(
		"models/"
);
$Config->Assistants = array(
		"assistants/",
		"frame/assistants/"
);
$Config->Plugins = array(
		"plugins/",
		"frame/plugins/"
);
$Config->Views = array(
		"views/"
);


$Config->DocRoot = $_SERVER['DOCUMENT_ROOT']."/";
$Config->Root = "http://".$_SERVER['HTTP_HOST']."/";
