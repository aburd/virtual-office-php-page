<?php
/*  
  GLOBALS
*/
// Set the root folder
define('__ROOT__', dirname(__FILE__));
// Set the language of the page
$lang = "ja";

/*  
  LOAD CONFIG FILE
*/
require_once(__ROOT__ . "/resources/config.php");


/*
  SETUP LAYOUT
*/

// load Header
require_once(TEMPLATES_PATH . "/header.php");

// load Body
require_once(TEMPLATES_PATH . "/slider.php");
require_once(TEMPLATES_PATH . "/details.php");
require_once(TEMPLATES_PATH . "/locations.php");

// load Footer
require_once(TEMPLATES_PATH . "/footer.php");
?>
