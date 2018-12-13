        <html>
            <head>
                <style>
                    body{font-face:Verdana}
                    td{font-size:2em;padding:10px}
                    .ac{font-weight:bold; background-color:#aaa;margin:4px;padding:3px;font-size:2em;color:blue}
                    .ac a{text-decoration:none}
                </style>
            </head>
            <body>
                <h2>PROBADORES</h2>
                <?php if(isset($error)) echo $error; ?>
                <table border="1"><tr><th>Probador</th><th>Prendas</th></tr>
                <?php
                foreach($_SESSION['probador'] as $p=>$prendas){
                    echo "<tr><td>Probador $p</td><td>$prendas</td><td>";
                    echo "<span class=ac><a href='?ac=a&p=$p'> + </a></span> ";
                    echo "<span class=ac><a href='?ac=b&p=$p'> - </a></span> ";
                    echo "<span class=ac><a href='?ac=x&p=$p'> x </a></span> ";
                    echo "</td></tr>";
                }
                ?>
                </table>
                <hr>
                <a href="?ac=t">Vaciar todo</a>
    </body></html>

