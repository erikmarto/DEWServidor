<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clases".
 *
 * @property int $id
 * @property string $fecha
 * @property string $hora1
 * @property string $hora2
 * @property int $salas_id
 * @property int $grupos_id
 *
 * @property Asistentes[] $asistentes
 * @property Grupos $grupos
 * @property Salas $salas
 */
class Clases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'hora1', 'hora2'], 'safe'],
            [['salas_id', 'grupos_id'], 'required'],
            [['salas_id', 'grupos_id'], 'integer'],
            [['grupos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Grupos::className(), 'targetAttribute' => ['grupos_id' => 'id']],
            [['salas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Salas::className(), 'targetAttribute' => ['salas_id' => 'id']],
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
            'hora1' => 'Hora Inicio',
            'hora2' => 'Hora Fin',
            'salas_id' => 'Salas ID',
            'grupos_id' => 'Grupos ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsistentes()
    {
        return $this->hasMany(Asistentes::className(), ['clases_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupo()
    {
        return $this->hasOne(Grupos::className(), ['id' => 'grupos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalas()
    {
        return $this->hasOne(Salas::className(), ['id' => 'salas_id']);
    }
}
