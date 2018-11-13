        <html>
            <head>
                <style>
                    body{font-face:Verdana}
                    td{font-size:1.5em;padding:5px}
                    .ac{font-weight:bold; width:40px;background-color:#aaa;margin:4px;padding:3px;font-size:2em;color:blue}
                    .ac a{text-decoration:none}
                </style>
            </head>
            <body>
                <h2>PROBADORES</h2>
                <?php if(isset($error)) echo $error; ?>
                <table border="1"><tr><th>Probador</th><th>Prendas</th><th>Hora</th></tr>
                <?php
                foreach($_SESSION['probador'] as $p=>$prendas): ?>
                	<tr><td>Probador <?= $p?></td><td><?= $prendas?> </td>
					<td><?php if(isset($_SESSION['hora'][$p])) echo $_SESSION['hora'][$p]; ?></td>
					<td>
						<form method=post>
							<input type=hidden name=p value=<?=$p?>>
							<button <?php if($prendas==4) echo 'disabled' ?> class=ac name=ac value="a"> + </button>
							<button <?php if(!$prendas) echo 'disabled' ?> class=ac name=ac value="b"> - </button>
							<?php if($prendas) : ?>
								<button  class=ac name=ac value="x"> X </button>
							<?php endif; ?>
						</form>
                    </td></tr>
                <?php endforeach; ?>

                </table>
                <hr>
                	<form method=post>
						<button class=vaciar name=ac value="t">Vaciar todo</button>
					</form>
    </body></html>
