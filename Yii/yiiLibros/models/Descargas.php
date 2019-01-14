<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "descargas".
 *
 * @property int $id
 * @property int $ebooks_id
 * @property int $usuarios_id
 * @property string $fecha
 *
 * @property Ebooks $ebooks
 * @property Usuarios $usuarios
 */
class Descargas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'descargas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ebooks_id', 'usuarios_id'], 'required'],
            [['ebooks_id', 'usuarios_id'], 'integer'],
            [['fecha'], 'safe'],
            [['ebooks_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ebooks::className(), 'targetAttribute' => ['ebooks_id' => 'id']],
            [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuarios_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ebooks_id' => 'Ebooks ID',
            'usuarios_id' => 'Usuarios ID',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEbooks()
    {
        return $this->hasOne(Ebooks::className(), ['id' => 'ebooks_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuarios_id']);
    }
}
