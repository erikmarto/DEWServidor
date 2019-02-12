<?php
namespace app\models;

use Yii;

class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return 'usuarios';
    }

    public function rules()
    {
        return [
            [['usuario', 'nombre', 'password', 'roles'], 'required'],
            [['fecha_alta', 'fecha_baja', 'ult_fecha'], 'safe'],
            [['observ'], 'string'],
            [['usuario'], 'string', 'max' => 16],
            [['nombre', 'fichero_foto'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 128],
            [['password'], 'validaPassword'],
            [['password2'], 'string', 'max' => 32],
            [['estado', 'origen'], 'string', 'max' => 1],
            [['telefono'], 'string', 'max' => 9],
            [['roles'], 'string', 'max' => 8],
            [['token'], 'string', 'max' => 64],
            [['usuario'], 'unique'],
            [['email'], 'unique'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg, gif'],
        ];
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}

?>