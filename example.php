<?php
/** 
 * Include the base daemon class 
 * then extend for your purposes
 * This daemon class is great for stuff like video encoding or Imagemagick photo manipulation
 */
require_once ('daemon.class.php');
require_once ('example.daemon.class.php');

$daemon = new ExampleDaemon();
$daemon->start();
?>