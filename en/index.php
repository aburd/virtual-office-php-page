<?php
/*  
  GLOBALS
*/
// Set the root folder
define('__ROOT__', dirname(dirname(__FILE__)));
// Set the language of the page
$lang = "en"; // declare language of page

/*  
  LOAD CONFIG FILE
*/
require_once(__ROOT__ . "/resources/config.php");


/*
  SETUP LAYOUT
*/

// load Header
require_once(TEMPLATES_PATH . "/en/header.php");

// load Body
require_once(TEMPLATES_PATH . "/en/slider.php");
require_once(TEMPLATES_PATH . "/en/details.php");
require_once(TEMPLATES_PATH . "/en/locations.php");

// load Footer
require_once(TEMPLATES_PATH . "/en/footer.php");
?>
