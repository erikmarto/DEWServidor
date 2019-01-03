<?php
function vererror($e, $k) {
    $msg = '';
    if (isset($e->errors[$k])) {
        $msg = "<p class='text-danger'>".$e->errors[$k][0]."</p>";
    }
    return  $msg;
}
?>