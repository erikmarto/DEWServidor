<div class="form" style="margin:auto;width:300px">
	<h2>Login</h2>
	<hr>
	<form method='post'>
		<?php
			echo Mhtml::textfield($usuario,'usuario') ?>
			<br>
		<?php 
			echo Mhtml::textfield($usuario,'password','password') ?>
			<br>
			<button type="submit" class="btn-block btn btn-dark">Entrar</button>
	</form>
</div>
