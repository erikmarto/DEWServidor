<?php
/** Ejemplo de aplicación con MFP: Microframework PHP
 * Versión 0.3
 * (c)IES FSL 2017
 */
require "vendor/mfp/mfp.php";

$app=app::instance();

$app->debug=true;

$app->run();

?>