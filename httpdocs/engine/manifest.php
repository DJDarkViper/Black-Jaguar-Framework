<?php
/**
 * Include Manifest
 */

$includes = array(
		"config/config",
		"config/autoload",
		"engine/plugins/debug",
		"engine/plugins/uri",
		"engine/plugins/load",
		"engine/plugins/database",
		"engine/plugins/session",
		"engine/plugins/email",
		"engine/assistants/html",
		"engine/assistants/input",
		"engine/assistants/system",
		"engine/engine"
);


// Loads the includes
foreach($includes as $inc) { include($_SERVER['DOCUMENT_ROOT']."/".$inc.".php"); }
