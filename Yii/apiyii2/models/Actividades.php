<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actividades".
 *
 * @property int $id
 * @property string $actividad
 * @property string $detalle
 *
 * @property Grupos[] $grupos
 */
class Actividades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actividades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['actividad'], 'required'],
            [['detalle'], 'string'],
            [['actividad'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'actividad' => 'Actividad',
            'detalle' => 'Detalle',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupos::className(), ['actividades_id' => 'id']);
    }
}
