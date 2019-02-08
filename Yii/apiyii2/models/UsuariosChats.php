<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios_chats".
 *
 * @property string $id
 * @property int $usuarios_id
 * @property int $chats_id
 * @property int $ultima_id
 *
 * @property Chats $chats
 * @property Usuarios $usuarios
 */
class UsuariosChats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios_chats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuarios_id', 'chats_id'], 'required'],
            [['usuarios_id', 'chats_id', 'ultima_id'], 'integer'],
            [['id'], 'string', 'max' => 45],
            [['usuarios_id', 'chats_id'], 'unique', 'targetAttribute' => ['usuarios_id', 'chats_id']],
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
            'usuarios_id' => 'Usuarios ID',
            'chats_id' => 'Chats ID',
            'ultima_id' => 'Ultima ID',
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
