<?php
$Config = new stdClass();

/* Base Configurations */


/**
* DefaultController
* This is the controller called when landing on the front page
**/
$Config->DefaultController = "main";


/**
* Database Configuration
**/
$Config->db = new stdClass();
$Config->db->connect = false;		// Whether to connect or not
$Config->db->condition = ".dev";	// A part of the url to look for to 
									//    differentiate between local and live
$Config->db->config = array(		// Local and Live Connection Information
	"local"=>array(
		"Host"=>"localhost",
		"Username"=>"root",
		"Password"=>"",
		"Database"=>""
	),
	"live"=>array(
		"Host"=>"localhost",
		"Username"=>"root",
		"Password"=>"",
		"Database"=>""
	)
);


/**
 * The arrays listed below are the main directory search configurations. 
 * You are free to add more, the order matters (top obviusly higher priority) 
 **/
$Config->Controllers = array(
		$ApplicationFolder."/controllers/"
);
$Config->Models = array(
		$ApplicationFolder."/models/"
);
$Config->Assistants = array(
		$ApplicationFolder."/assistants/",
		$EngineFolder."/assistants/"
);
$Config->Plugins = array(
		$ApplicationFolder."/plugins/",
		$EngineFolder."/plugins/"
);
$Config->Views = array(
		$ApplicationFolder."/views/"
);


/**
* Nevermind These
**/
$Config->DocRoot = $_SERVER['DOCUMENT_ROOT']."/";
$Config->Root = "http://".$_SERVER['HTTP_HOST']."/";
