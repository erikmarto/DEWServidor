<?php
require 'banner.php'
?>
<html>
    <head>
        <style>
            .banner{margin:10px;padding:10px;background:#eee}
        </style>
    </head>
    <body>
        <h3>MI BLOG</h3>
        <div style='width:80%;float:left'>
            Aqui el contenido
        </div>
        <div style='width:20%;float:left'>
            <?= getbanner() ?>
            <p>
            <?= getbanner() ?>
            
        </div>
    </body>
</html>
