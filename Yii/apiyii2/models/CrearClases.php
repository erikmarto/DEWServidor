<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CrearClases extends Model {
    public $grupos_id;
    public $salas_id;
    public $fecha1;
    public $fecha2;
      
    public function rules()
    {
        return [
            [['fecha1', 'fecha2','salas_id'], 'required'],            
            ['fecha1','compare','compareAttribute'=>'fecha2','operator'=>'<'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'grupos_id' => 'Nombre de Grupo',
            'fecha1' => 'Fecha Inicio',
            'fecha2' =>'Fecha Fin',
            'salas_id'=>'Nombre de Sala',
        ];
    }
 
     public function getgrupo()
    {
        return $this->hasOne(Grupos::className(), ['id' => 'grupos_id']);
    }

}