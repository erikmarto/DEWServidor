<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $usuario
 * @property string $nombre
 * @property string $email
 * @property string $password
 * @property string $estado
 * @property int $readers_id
 * @property string $ult_fecha
 * @property int $padrino_id
 * @property int $puntos
 * @property string $emailkindle
 *
 * @property Comentarios[] $comentarios
 * @property Descargas[] $descargas
 * @property Peticiones[] $peticiones
 * @property Titulos[] $titulos
 * @property Readers $readers
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario', 'puntos', 'emailkindle'], 'required'],
            [['readers_id', 'padrino_id', 'puntos'], 'integer'],
            [['ult_fecha'], 'safe'],
            [['usuario'], 'string', 'max' => 12],
            [['nombre', 'email'], 'string', 'max' => 40],
            [['password'], 'string', 'max' => 32],
            [['estado'], 'string', 'max' => 1],
            [['emailkindle'], 'string', 'max' => 60],
            [['readers_id'], 'exist', 'skipOnError' => true, 'targetClass' => Readers::className(), 'targetAttribute' => ['readers_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'usuario' => Yii::t('app', 'Usuario'),
            'nombre' => Yii::t('app', 'Nombre'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'estado' => Yii::t('app', 'Estado'),
            'readers_id' => Yii::t('app', 'Readers ID'),
            'ult_fecha' => Yii::t('app', 'Ult Fecha'),
            'padrino_id' => Yii::t('app', 'Padrino ID'),
            'puntos' => Yii::t('app', 'Puntos'),
            'emailkindle' => Yii::t('app', 'Emailkindle'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::className(), ['usuario_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescargas()
    {
        return $this->hasMany(Descargas::className(), ['usuarios_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeticiones()
    {
        return $this->hasMany(Peticiones::className(), ['usuarios_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitulos()
    {
        return $this->hasMany(Titulos::className(), ['usuarios_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReaders()
    {
        return $this->hasOne(Readers::className(), ['id' => 'readers_id']);
    }
}
