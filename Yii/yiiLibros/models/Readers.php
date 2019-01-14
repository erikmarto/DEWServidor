<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "readers".
 *
 * @property int $id
 * @property string $descri
 * @property string $formats
 *
 * @property Usuarios[] $usuarios
 */
class Readers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'readers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descri'], 'string', 'max' => 45],
            [['formats'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descri' => 'Descri',
            'formats' => 'Formats',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['readers_id' => 'id']);
    }
}
