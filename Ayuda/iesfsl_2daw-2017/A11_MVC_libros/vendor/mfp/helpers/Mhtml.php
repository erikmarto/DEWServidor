<?php

/** Helpers de vistas
 * @author Cecilio Albero
 */
class Mhtml {


	/** Devuelve el atributo name de un campo de formulario
	 *
	 * @param type $model
	 * @param type $attribute
	 * @return type string   Nombredelaclase[atributo]
	 */
	public static function inputname($model,$attribute){
		return get_class($model).'['.$attribute.']';
	}
	/**
	 * Genera la etiqueta para un campo de formulario
	 * @param type $model
	 * @param type $attribute
	 * @param type $type  text,checkbox,radio
	 */
	public static function label($model,$attribute){
            printf('<label>%s</label>',$model->getlabel($attribute));
	}
        
	/**
	 * Genera un campo tipo text, checkbox o radio en un formulario
	 * @param type $model
	 * @param type $attribute
	 * @param type $type  text,checkbox,radio
	 */
	public static function textfield($model,$attribute,$type='text',$options=''){
		echo '<div class=field>';
		printf('<label>%s</label> <input type=%s name="%s" value="%s" $options>',
				$model->getlabel($attribute),$type,self::inputname($model,$attribute),$model->$attribute);
		if(isset($model->errors[$attribute]))
			printf('<div class=fielderror>%s</div>',implode('<br>',$model->errors[$attribute]));
		echo '</div>';
	}


	/** Crea un desplegable
	 *
	 * @param type $model
	 * @param type $attribute
	 * @param type $lista Lista de valores
	 */
	static function dropdownlist($model,$attribute,$lista,$options=''){
		echo '<div class=field>';
		printf('<label>%s</label>',$model->getlabel($attribute));
		$name=self::inputname($model,$attribute);
		echo "<select name='$name' $options>";
		echo "<option value=''>(Seleccione)</option>";
		foreach($lista as $valor=>$descri){
			//$selected=$valor==$valorselecc ? "selected" :"";
			if($valor==$model->$attribute)
				$selected="selected";
			else
				$selected="";

			echo "<option $selected value='$valor'>$descri</option>";
		}
		echo "</select>";
		if(isset($model->errors[$attribute]))
			printf('<div class=fielderror>%s</div>',implode('<br>',$model->errors[$attribute]));

		echo "</div>";

	}
        /**
         * Genera una tabla con una lista de datos de un modelo
         * @param type $model
         * @param type $attributes
         */
	static function verticalview($model,$attributes){
		echo "<table class=vview border=0>";
		foreach($attributes as $a){
			echo "<tr><th>".$model->getlabel($a)."</th><td>".$model->$a."</td></tr>";
		}
		echo "</table>";
	}
	
	static function table($models,$attributes,
					$actions=['view'=>'Ver','update'=>'Modificar','delete'=>'Borrar']){
		echo "<table class='table' border=0><tr>";
		foreach($attributes as $a){
			echo "<th>".$models[0]->getlabel($a);
		}
		echo "</tr>";
		foreach($models as $model){
			echo "<tr>";
			foreach($attributes as $a)
				echo "<td>".$model->$a."</td>";
			echo '<td>';	
			foreach($actions as $action=>$label){
				echo Mhtml::actionlink($action,$label,['id'=>$model->id]).' ';
			}
			echo "</tr>";		
		}
		echo "</table>";
	}	
	
	/**
	 * Muestra un enlace a una acción
	 * @param type $action Acción de la forma controlador/acción
	 * @param type $label Etiqueta a mostrar
	 * @param type $params parámetros a pasar a la acción
	 * @param type $class Estilo css
	 */
	static function actionlink($action,$label,$params=array(),$class=''){
		if(strpos($r,'/')===false) $r=app::instance()->r[0].'/'.$action;
		
		if($class) echo "<span class='$class'>";
                echo "<a href='?r=$action";
		if($params)
			foreach($params as $p=>$v) echo "&$p=$v";
			echo "'>$label</a>";
            if($class) echo '</span>';
	}
	
	/**
	 * Muestra un menú de acciones.
	 * @param type $acciones Array de acciones. Cada acción tiene los elementos:
	 * 	-action: acción 
	 *  -params: parámetros de la action, de la forma param=>valor. Es opcional
	 *  -label: Etiqueta a mostrar
	 *  -roles: roles a checkear para mostrarlo (opcional)
	 * Ejemplo:
	 * Mhtml::menu([
		['action'=>'categorias','label'=>'Categorías','visible'=>'AD']
	 * ]);
	 */
	static function menu($acciones){
		foreach($acciones as $action){
			if(isset($action['roles']) && !app::instance()->checkrole($action['roles'])) continue;
			$params=isset($action['params'])? $action['params'] :[];
			self::actionlink($action['action'],$action['label'],$params,'menu');
		}

	}
	/**
	 * Muestra un navegador de páginas
	 * @param type $limit array page=>n,pageSize=>m
	 */
	static function navegador($limit,$count){
		$url='?'.$_SERVER['QUERY_STRING']; //Parámetros de ejcución. 
		$url=preg_replace('/page=[\d]+/','',$url); //Le quita page=n
		
		$page=$limit['page'];
		$pageSize=$limit['pageSize'];
		echo '<div class=nav> Mostrando ';
		$ini= ($page-1)*$pageSize+1;
		if($page>1) 
			printf( "&nbsp; <a href='%s&page=%d'> &lt; </a> &nbsp; ",$url,$page-1);
		printf( "%d/%d &nbsp;",$ini,$ini+$count-1);
			if($count==$pageSize) 
			printf( " <a href='%s&page=%d'> &gt; </a>",$url,$page+1);
		echo '</div>';
	}
	static function showerrors($model){
		if($model->errors) {
			echo '<div class="alert alert-danger">';
			foreach($model->errors as $atributo=>$errores){
				echo '<li>'.$model->getlabel($atributo).': '.implode(',',$errores);
			}
			echo '</div>';	

		}
	}
}