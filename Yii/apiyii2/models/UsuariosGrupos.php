<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios_grupos".
 *
 * @property int $id
 * @property int $usuarios_id
 * @property int $grupos_id
 * @property string $cuota
 * @property string $fecha_alta
 * @property string $fecha_baja
 * @property string $rol
 *
 * @property Grupos $grupos
 * @property Usuarios $usuarios
 */
class UsuariosGrupos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios_grupos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuarios_id', 'grupos_id'], 'integer'],
            [['cuota'], 'number'],
            [['fecha_alta', 'fecha_baja'], 'safe'],
            [['rol'], 'string', 'max' => 1],
            [['grupos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Grupos::className(), 'targetAttribute' => ['grupos_id' => 'id']],
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
            'grupos_id' => 'Grupos ID',
            'cuota' => 'Cuota',
            'fecha_alta' => 'Fecha Alta',
            'fecha_baja' => 'Fecha Baja',
            'rol' => 'Rol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasOne(Grupos::className(), ['id' => 'grupos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuarios_id']);
    }
}
