<?php
/**
 * Include Manifest
 */

$includes = array(
		"config/config",
		"engine/plugins/uri",
		"engine/plugins/load",
		"engine/plugins/database",
		"engine/assistants/html"
);


// Loads the includes
foreach($includes as $inc) { include($_SERVER['DOCUMENT_ROOT']."/".$inc.".php"); }