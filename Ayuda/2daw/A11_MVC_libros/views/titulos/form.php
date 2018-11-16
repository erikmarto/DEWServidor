<?php
Mhtml::showerrors($titulo);
?>
<div class="form>">
	<form method=post>
        <div class='field'>

			<?php echo Mhtml::textfield($titulo, 'titulo') ?>
        </div>
        <div class='field'>
			<?php
			echo Mhtml::dropdownlist($titulo, 'autor_id', autores::findList('id', 'nombre'));
			?>
		</div>
        <div class='field'>
			<?php
			echo Mhtml::dropdownlist($titulo, 'categoria_id', categorias::findList('id', 'nombre'));
			?>
		</div>
		<div class='field'>
			<?php
			echo Mhtml::textfield($titulo, 'anyo');
			?>
		</div>
		<div class='field'>
			<?php
			echo Mhtml::textfield($titulo, 'calificacion');
			?>
		</div>
		<div class='field'>
			<?php
			echo Mhtml::textfield($titulo, 'portada');
			?>
		</div>
		<input type="submit" value="Actualizar" class='btn btn-primary'>
	</form>
</div>
