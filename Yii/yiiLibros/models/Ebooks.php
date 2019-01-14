<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ebooks".
 *
 * @property int $id
 * @property string $format
 * @property string $fecha
 * @property string $estado
 * @property string $observaciones
 * @property int $titulos_id
 * @property string $path
 *
 * @property Descargas[] $descargas
 * @property Titulos $titulos
 */
class Ebooks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ebooks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['titulos_id'], 'required'],
            [['titulos_id'], 'integer'],
            [['format'], 'string', 'max' => 4],
            [['estado'], 'string', 'max' => 1],
            [['observaciones'], 'string', 'max' => 600],
            [['path'], 'string', 'max' => 255],
            [['titulos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Titulos::className(), 'targetAttribute' => ['titulos_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'format' => 'Format',
            'fecha' => 'Fecha',
            'estado' => 'Estado',
            'observaciones' => 'Observaciones',
            'titulos_id' => 'Titulos ID',
            'path' => 'Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescargas()
    {
        return $this->hasMany(Descargas::className(), ['ebooks_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitulos()
    {
        return $this->hasOne(Titulos::className(), ['id' => 'titulos_id']);
    }
}
