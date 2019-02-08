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
 * @property Clases $clases
 * @property Usuarios $usuarios
 */
class Asistentes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asistentes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clases_id', 'usuarios_id'], 'required'],
            [['clases_id', 'usuarios_id'], 'integer'],
            [['confirmado'], 'string', 'max' => 1],
            [['clases_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clases::className(), 'targetAttribute' => ['clases_id' => 'id']],
            [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuarios_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'clases_id' => Yii::t('app', 'Clases ID'),
            'usuarios_id' => Yii::t('app', 'Usuarios ID'),
            'confirmado' => Yii::t('app', 'Confirmado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClase()
    {
        return $this->hasOne(Clases::className(), ['id' => 'clases_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuarios_id']);
    }
}
