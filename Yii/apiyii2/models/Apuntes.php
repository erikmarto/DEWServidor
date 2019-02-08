<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apuntes".
 *
 * @property int $id
 * @property int $usuarios_id
 * @property string $fecha_pago
 * @property string $importe
 * @property string $concepto
 * @property string $fecha
 * @property int $grupos_id
 * @property string $mes
 *
 * @property Grupos $grupos
 * @property Usuarios $usuarios
 */
class Apuntes extends \yii\db\ActiveRecord
{
    public static $tipoOptions = ['A'=>'Abono','C'=>'Cargo'];
    public  $anyoApunte;
    public  $mesApunte;
    public static $opcionesMes=['1'=>'Enero','2'=>'Febrero','3'=>'Marzo','4'=>'Abril','5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre','11'=>'noviembre','12'=>'Diciembre'];
    public $datosestadisticas=[];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apuntes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuarios_id'], 'required'],
            [['id', 'usuarios_id', 'grupos_id'], 'integer'],
            [['importe'], 'number'],
            [['fecha', 'mes'], 'safe'],
            [['grupos'], 'string', 'max' => 40],
            [['tipo'], 'string', 'max' => 1],
            [['anyoApunte','mesApunte'], 'integer'],
           
          //  [['grupos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Grupos::className(), 'targetAttribute' => ['grupos_id' => 'id']],
          //  [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuarios_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuarios_id' => 'Usuarios',
            'tipo'=>'Tipo',
            'importe' => 'Importe',
            'grupos.nombre' => 'Grupos',
            'fecha' => 'Fecha',
            'grupos_id' => 'Grupos ID',
            'mes' => 'Mes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasOne(Grupos::className(), ['id' => 'grupos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function sumaCargos($fecha,$grupo){
        return Apuntes::find()->where("mes is not NULL")->andWhere("mes='".$fecha."' and tipo='C' and grupos_id='".$grupo."'")->sum('importe');
    }
    
    public function sumaAbonos($fecha,$grupo){
        return Apuntes::find()->where("mes is not NULL")->andWhere("mes='".$fecha."' and tipo='A' and grupos_id='".$grupo."'")->sum('importe');
    }

    public function getEstadisticas($fecha,$grupo){
        $datos=["cargos"=>$this->sumaCargos($fecha, $grupo),"abonos"=>$this->sumaAbonos($fecha, $grupo),"morosidad"=>Apuntes::find()->where("mes is not null")->andWhere("mes='".$fecha."' and grupos_id='".$grupo."'")->sum('importe')];
        return $datos;
    }

    public function getUsuario(){
        return $this->hasOne(Usuarios::className(), ['id' => 'usuarios_id']);
    }

}
