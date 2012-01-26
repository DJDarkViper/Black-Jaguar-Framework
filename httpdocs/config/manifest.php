<?php
/**
 * Include Manifest
 */

$includes = array(
		"config/config",
		"frame/plugins/uri",
		"frame/plugins/load",
		"frame/plugins/database"
);


// Loads the includes
foreach($includes as $inc) { include($_SERVER['DOCUMENT_ROOT']."/".$inc.".php"); }