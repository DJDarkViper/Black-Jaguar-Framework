
<?php
/* Base Configurations */


/**
* DefaultController
* This is the controller called when landing on the front page
**/
$Config->DefaultController = "main";


/**
* Database Configuration
**/
$Config->db->engine = "mysql";
$Config->db->connect = false;		// Whether to connect or not
$Config->db->condition = "";	// A part of the url to look for to 
									// differentiate between local and live
$Config->db->config = array(		// Local and Live Connection Information
	"local"=>array(
		"Host"=>"localhost",
		"Username"=>"root",
		"Password"=>"",
		"Database"=>""
	),
	"live"=>array(
		"Host"=>"localhost",
		"Username"=>"",
		"Password"=>"",
		"Database"=>""
	)
);


// These pages (based on URI) will be forced to HTTPS mode, all other pages will be forced HTTP
$Config->SecurePages = array(
		
);


/**
* Nevermind These
**/
$Config->DocRoot = $_SERVER['DOCUMENT_ROOT']."/";
$Config->Root = "http://".$_SERVER['HTTP_HOST']."/";
		
		
		