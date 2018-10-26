<?php

function mostrar($arryImg, $delete = true) {
    echo '<div class="row justify-content-center">';
    foreach ($arryImg as $img) {
        echo "<div class='card' style='width: 200px'>
                <img class='card-img-top' src='img/$img'>";
        if ($delete) {
            echo "<div class='card-img-overlay'>
            <input type='checkbox' name='borrarImg[]' value='$img'></div>";
        }
        echo "</div>";
    }
    echo '</div>';
}

?>