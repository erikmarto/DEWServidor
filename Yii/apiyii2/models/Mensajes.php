<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mensajes".
 *
 * @property int $id
 * @property string $fecha
 * @property string $texto
 * @property int $chats_id
 * @property int $usuarios_id
 *
 * @property Chats $chats
 * @property Usuarios $usuarios
 */
class Mensajes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mensajes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['texto'], 'string'], 
            ['fecha', 'default', 'value' => date('Y-m-d H:i:s')],
            [['chats_id', 'usuarios_id'], 'required'],
            [['chats_id', 'usuarios_id'], 'integer'],
            [['chats_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chats::className(), 'targetAttribute' => ['chats_id' => 'id']],
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
            'fecha' => 'Fecha',
            'texto' => '',
            'chats_id' => '',
            'usuarios_id' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChats()
    {
        return $this->hasOne(Chats::className(), ['id' => 'chats_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuarios_id']);
    }
}
