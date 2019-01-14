<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peticiones".
 *
 * @property int $id
 * @property string $fecha
 * @property string $titulo
 * @property string $autor
 * @property string $observaciones
 * @property int $usuarios_id
 * @property int $peticiones_id
 *
 * @property Usuarios $usuarios
 * @property Peticiones $peticiones
 * @property Peticiones[] $peticiones0
 */
class Peticiones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peticiones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['observaciones'], 'string'],
            [['usuarios_id'], 'required'],
            [['usuarios_id', 'peticiones_id'], 'integer'],
            [['titulo', 'autor'], 'string', 'max' => 45],
            [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuarios_id' => 'id']],
            [['peticiones_id'], 'exist', 'skipOnError' => true, 'targetClass' => Peticiones::className(), 'targetAttribute' => ['peticiones_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'titulo' => 'Titulo',
            'autor' => 'Autor',
            'observaciones' => 'Observaciones',
            'usuarios_id' => 'Usuarios ID',
            'peticiones_id' => 'Peticiones ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuarios_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeticiones()
    {
        return $this->hasOne(Peticiones::className(), ['id' => 'peticiones_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeticiones0()
    {
        return $this->hasMany(Peticiones::className(), ['peticiones_id' => 'id']);
    }
}
