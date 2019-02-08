<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chats".
 *
 * @property int $id
 * @property string $tipo
 * @property int $grupos_id
 *
 * @property Grupos $grupos
 * @property Mensajes[] $mensajes
 * @property UsuariosChats[] $usuariosChats
 * @property Usuarios[] $usuarios
 */
class Chats extends \yii\db\ActiveRecord
{

    public static $tipoOptions = ['G' => 'Grupo', 'X' => 'General'];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grupos_id'], 'integer'],
            [['tipo'], 'string', 'max' => 1],
            [['grupos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Grupos::className(), 'targetAttribute' => ['grupos_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'grupos_id' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo(){
        return self::$tipoOptions[$this->tipo];
    }

    public function getNombre(){
        if($this->tipo=='X')
            return 'General';
        else 
            return $this->grupo->nombre;
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
    public function getMensajes()
    {
        return $this->hasMany(Mensajes::className(), ['chats_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuariosChats()
    {
        return $this->hasMany(UsuariosChats::className(), ['chats_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['id' => 'usuarios_id'])->viaTable('usuarios_chats', ['chats_id' => 'id']);
    }

    
}
