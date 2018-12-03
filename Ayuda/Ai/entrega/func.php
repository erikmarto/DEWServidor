<?php
function mostrarImagenes($imgArr, $delete = true)
{
    echo '<div class="row justify-content-center" id="imgContainer">';
    foreach ($imgArr as $image) {
        echo "<div class='card' style='width: 200px'>
                <img class='card-img-top img-responsive' src='images/$image'>";
        if ($delete) {
            echo "<div class='card-img-overlay d-flex justify-content-end text-right flex-column h-100'>
            <input type='checkbox' name='deleteImg[]' value='$image'></div>";
        }
        echo "</div>";

    }
    echo '</div>';
}
