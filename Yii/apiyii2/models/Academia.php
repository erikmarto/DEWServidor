<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "academia".
 *
 * @property int $id
 * @property string $nombre
 * @property string $direccion
 * @property string $web
 * @property string $telefono
 */
class Academia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'academia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['direccion'], 'string'],
            [['nombre'], 'string', 'max' => 45],
            [['web'], 'string', 'max' => 80],
            [['telefono'], 'string', 'max' => 9],
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
            'direccion' => 'Direccion',
            'web' => 'Web',
            'telefono' => 'Telefono',
        ];
    }
}
