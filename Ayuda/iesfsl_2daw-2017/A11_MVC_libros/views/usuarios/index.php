<?php

foreach($usuarios as $u){
	echo '<li>';
	Mhtml::actionlink('usuarios/view',$u,['id'=>$u->id]);
}

