<?php
/** controlador/accion
 *  controladorController { function actionAccion() {}}
 */
require "mfp/mfp.php";
require "lib/lib.php";

$app=app::instance();

$app->debug=true;

$app->run();
?>