<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentarios".
 *
 * @property int $id
 * @property string $fecha
 * @property int $usuario_id
 * @property int $titulo_id
 * @property string $texto
 * @property string $valoracion
 * @property string $fecha_descarga
 *
 * @property Usuarios $usuario
 * @property Titulos $titulo
 */
class Comentarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'fecha_descarga'], 'safe'],
            [['usuario_id', 'titulo_id'], 'integer'],
            [['texto'], 'string'],
            [['valoracion'], 'string', 'max' => 1],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuario_id' => 'id']],
            [['titulo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Titulos::className(), 'targetAttribute' => ['titulo_id' => 'id']],
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
            'usuario_id' => 'Usuario ID',
            'titulo_id' => 'Titulo ID',
            'texto' => 'Texto',
            'valoracion' => 'Valoracion',
            'fecha_descarga' => 'Fecha Descarga',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitulo()
    {
        return $this->hasOne(Titulos::className(), ['id' => 'titulo_id']);
    }
}
