<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupos".
 *
 * @property int $id
 * @property int $actividades_id
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $dias_semana
 * @property string $hora1
 * @property string $hora2
 * @property string $estado
 * @property string $cuota
 * @property int $salas_id
 * @property int $plazas
 *
 * @property Apuntes[] $apuntes
 * @property Chats[] $chats
 * @property Clases[] $clases
 * @property Actividades $actividades
 * @property Salas $salas
 * @property UsuariosGrupos[] $usuariosGrupos
 */
class Grupos extends \yii\db\ActiveRecord
{
    public static $dias=[
        'L'=>'Lunes',
        'M'=>'Martes',
        'X'=>'Miercoles',
        'J'=>'Jueves',
        'V'=>'Viernes',
        'S'=>'Sabado',
        'D'=>'Domingo'
    ];

    public static $estadosGrupos=[
        'A'=>'Activo',
        'B'=>'Cerrado',
        'M'=>'Pendiente Matricula',
    ];

    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'grupos';
    }

    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['nombre','actividades_id', 'salas_id'], 'required'],
            [['actividades_id', 'salas_id', 'plazas'], 'integer'],
            [['fecha_inicio', 'fecha_fin', 'hora1', 'hora2'], 'safe'],
            //[['fecha_inicio','fecha_fin'], 'date'],
            //[['hora1','hora2'],'time'],
            [['cuota'], 'number'],
            
            [['estado'], 'string', 'max' => 1],
            [['actividades_id'], 'exist', 'skipOnError' => true, 'targetClass' => Actividades::className(), 'targetAttribute' => ['actividades_id' => 'id']],
            [['salas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Salas::className(), 'targetAttribute' => ['salas_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre'=>'Nombre del Grupo',
            'actividades_id' => 'Nombre de Actividad',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_inicioText' =>'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'fecha_finText' =>'Fecha Fin',
            'dias_semana' => 'Dias Semana',
            'dias_semanaText' => 'Dias Semana',
            'hora1' => 'Hora de inicio',
            'hora1Text' => 'Hora de inicio',            
            'hora2' => 'Hora de fin',
            'hora2Text' => 'Hora de fin',
            'estadoText' => 'Estado',
            'cuota' => 'Cuota',
            'salas_id' => 'Salas',
            'plazas' => 'Plazas',
        ];
    }
 
    public function afterFind(){
        $this->dias_semana=str_split($this->dias_semana);
        return parent::afterFind();
    }
  
    public function beforeSave($insert){
        //Error al crear grupo / pero con update no da error
        $this->dias_semana=implode("",$this->dias_semana);
        return parent::beforeSave($insert);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */

    public function getApuntes()
    {
        return $this->hasMany(Apuntes::className(), ['grupos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getChats()
    {
        return $this->hasMany(Chats::className(), ['grupos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getClases()
    {
        return $this->hasMany(Clases::className(), ['grupos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getActividades()
    {
        return $this->hasOne(Actividades::className(), ['id' => 'actividades_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getSalas()
    {
        return $this->hasOne(Salas::className(), ['id' => 'salas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getUsuariosGrupos()
    {
        return $this->hasMany(UsuariosGrupos::className(), ['grupos_id' => 'id']);
    }
    
    // Funcion para sacar roles
    public function getUsuariosGruposRol($rol)
    {
        return $this->hasMany(UsuariosGrupos::className(), ['grupos_id' => 'id'])->where('rol=:rol',['rol'=>$rol]);
    }
    
    // Funcion para pasar la fecha a formato español
    public function getfecha_inicioText()
    {
        return Yii::$app->formatter->asDate($this->fecha_inicio);
    }

    public function getfecha_finText()
    {
        return Yii::$app->formatter->asDate($this->fecha_fin);
    }

    // Para devolver los dias de la semana en texto
    public function getdias_semanaText()
    {
        $diasSemana =[];
        foreach($this->dias_semana as $valor){
            array_push($diasSemana, $this::$dias[$valor]);
        }
        return implode(" - ",$diasSemana);
    }

    public function getdias_semanaids()
    {
        $ids = [];
        foreach($this->dias_semana as $valor){
            $ids[]= array_search($valor,array_keys(self::$dias))+1; 
        };
        return $ids;
    }
    
    // Devuelve el estado en texto
    public function getestadoText()
    {
        return $this::$estadosGrupos[$this->estado];
    }
    
    public function gethora1Text()
    {
        return Yii::$app->formatter->asTime($this->hora1,'short');
    }
    
     public function gethora2Text()
     {
        return Yii::$app->formatter->asTime($this->hora2,'short');
    }

    public function gethorario()
    {
        $fecha_Inicio = Yii::$app->formatter->asDate($this->fecha_inicio);
        $fecha_Fin = Yii::$app->formatter->asDate($this->fecha_fin);
        $horaInicio = Yii::$app->formatter->asTime($this->hora1,'short');
        $horaFin = Yii::$app->formatter->asTime($this->hora2,'short');
        
        return $fecha_Inicio." - ".$fecha_Fin." - ".$horaInicio." - ".$horaFin;
    }

    public function fields(){
        return array_merge(['estadoText']); //Añade estadoText y el array de comentarios definidos mediante una relación con el modelo Comentarios
    }
    
    public function extrafields(){
        return ['actividades']; 
    }
};
