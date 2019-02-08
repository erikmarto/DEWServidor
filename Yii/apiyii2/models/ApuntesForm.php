<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class ApuntesForm extends Model
{
    public $anyo;
    public $mes;
    public $grupos_id;
    /**
     * @return array the validation rules.
     */
    
    //Array con el numero y el nombre del mes para generarcuotas.php 
    public static $optionsmes=['1'=>'Enero','2'=>'Febrero','3'=>'Marzo','4'=>'Abril','5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre','11'=>'noviembre','12'=>'Diciembre'];    
    public function rules()
    {
        return [
            // username and password are both required
            [['anyo','mes','grupos_id'], 'required'],
            [['anyo','mes'], 'integer']
        ];
    }
     
    public function attributeLabels()
    {
        return [
            'anyo' => 'Año',
            'mes'  => 'Mes',
            'grupos_id'=>'Grupo'
        ];
    }
    public function getGrupo()
    {
        return \app\models\Grupos::findOne($this->grupos_id);
    }
}
