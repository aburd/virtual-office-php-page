<?php
define('__ROOT__', dirname(__FILE__));

// declare language of page
$lang = "ja"; 

// load up your config file
require_once(__ROOT__ . '/resources/config.php');

/********
**LAYOUT**
********/

// load Header
require_once(TEMPLATES_PATH . "/header.php");

// load Body
require_once(TEMPLATES_PATH . "/slider.php");
require_once(TEMPLATES_PATH . "/details.php");
require_once(TEMPLATES_PATH . "/locations.php");

// load Footer
require_once(TEMPLATES_PATH . "/footer.php");
?>
