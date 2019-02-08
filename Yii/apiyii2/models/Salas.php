<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salas".
 *
 * @property int $id
 * @property string $nombre
 * @property int $capacidad
 *
 * @property Clases[] $clases
 * @property Grupos[] $grupos
 */
class Salas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['capacidad'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'capacidad' => 'Capacidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClases()
    {
        return $this->hasMany(Clases::className(), ['salas_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupos::className(), ['salas_id' => 'id']);
    }
}
