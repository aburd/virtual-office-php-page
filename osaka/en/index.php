<?php
define('__ROOT__', dirname(dirname(__FILE__)));

// declare language of page
$lang = "en"; // declare language of page
// load up your config file
require_once(__ROOT__ . "/resources/config.php");


/********
**LAYOUT**
********/

// load Header
require_once(TEMPLATES_PATH . "/en/header.php");

// load Body
require_once(TEMPLATES_PATH . "/en/slider.php");
require_once(TEMPLATES_PATH . "/en/details.php");
require_once(TEMPLATES_PATH . "/en/locations.php");

// load Footer
require_once(TEMPLATES_PATH . "/en/footer.php");
?>
