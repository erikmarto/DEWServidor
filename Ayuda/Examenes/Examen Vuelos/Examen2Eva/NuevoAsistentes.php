<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asistentes".
 *
 * @property int $id
 * @property int $clases_id
 * @property int $usuarios_id
 * @property string $confirmado S=Si N=No Q=Quizás
 *
 * @property Usuarios $usuarios
 * @property Clases $clases
 */
class NuevoAsistentes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public static $tipoOptions=['S'=>'Si','N'=>'No'];
    
    public static function tableName()
    {
        return 'asistentes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clases_id', 'usuarios_id'], 'required'],
            [['clases_id', 'usuarios_id'], 'integer'],
            [['confirmado'], 'string', 'max' => 1],
            [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuarios_id' => 'id']],
            [['clases_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clases::className(), 'targetAttribute' => ['clases_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'clases_id' => 'Clases ID',
            'usuarios_id' => 'Usuarios ID',
            'confirmadoText' => 'Confirmado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfirmadoText(){
        return self::$tipoOptions[$this->tipo];
    }
    
    public function getUsuarios()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuarios_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClases()
    {
        return $this->hasOne(Clases::className(), ['id' => 'clases_id']);
    }
}
