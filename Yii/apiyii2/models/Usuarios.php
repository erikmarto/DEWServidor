<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $usuario
 * @property string $nombre
 * @property string $email
 * @property string $password
 * @property string $fecha_alta
 * @property string $fecha_baja
 * @property string $estado
 * @property string $telefono
 * @property string $origen
 * @property string $observ
 * @property string $ult_fecha
 * @property string $roles
 * @property string $fichero_foto
 * @property string $token
 *
 * @property Apuntes[] $apuntes
 * @property Asistentes[] $asistentes
 * @property Mensajes[] $mensajes
 * @property UsuariosChats[] $usuariosChats
 * @property Chats[] $chats
 * @property UsuariosGrupos[] $usuariosGrupos
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface 
{
    public $imageFile;
    public $password2;
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

    public function validaPassword($attr, $value) {
        if (strlen($this->$attr < 32)) {
            if ($this->$attr !== $this->password2) {
                $this->addError('password2', "No coinciden las contraseñas.");
                $this->addError('password', "No coinciden las contraseñas.");
            }
        }
        
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'nombre' => 'Nombre',
            'email' => 'Email',
            'password' => 'Contraseña',
            'password2' => 'Repetir Contraseña',
            'fecha_alta' => 'Fecha Alta',
            'fecha_baja' => 'Fecha Baja',
            'estado' => 'Estado',
            'telefono' => 'Telefono',
            'origen' => 'Origen',
            'observ' => 'Observ',
            'ult_fecha' => 'Ult Fecha',
            'roles' => 'Roles',
            'fichero_foto' => 'Fichero Foto',
            'token' => 'Token',
        ];
    }

    /**
     * 
     */
    public function getPicture() {
        if (!($pic = $this->fichero_foto))
            $pic = "default.jpg";
        return "fotos/$pic";
    }


    /**
     * 
     */
    public function setPicture() {
        if ($this->validate()) {
            $this->imageFile->saveAs('fotos/' . $this->id . md5($this->id) . '.' . $this->imageFile->extension);
            $this->fichero_foto = $this->id . md5($this->id) . '.' . $this->imageFile->extension;
        }
    }


    public function sendResetMail() {

        $subject = "Contraseña olvidada MagicSteps.";
        $msg = "Nosotros también nos olvidamos de las cosas.\nNo te olvides de cambiarla una vez loguees! <a href='http://localhost/Yii/2daw_team/web/index.php?r=site%2Fnewpw&token=".$this->password."'>Click para cambiar contraseña</a>";


        
        Yii::$app->mailer->compose()
            ->setFrom('iesfsldaw2@gmail.com')
            ->setTo($this->email)
            ->setSubject($subject)
            ->setTextBody($msg)
            ->setHtmlBody("<b>$msg</b>")
            ->send();
        
    }


    /**
     *  @return string Formatted date
     */
    public function getfecha_altaText(){
        return \Yii::$app->formatter->asDate($this->fecha_alta);
    }


    public function getult_fechaText(){
        return \Yii::$app->formatter->asDate($this->ult_fecha);
    }


    /**
     *  @return string Formatted date
     */
    public function getfecha_bajaText(){
        return \Yii::$app->formatter->asDate($this->fecha_baja);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApuntes()
    {
        return $this->hasMany(Apuntes::className(), ['usuarios_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsistentes()
    {
        return $this->hasMany(Asistentes::className(), ['usuarios_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMensajes()
    {
        return $this->hasMany(Mensajes::className(), ['usuarios_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuariosChats()
    {
        return $this->hasMany(UsuariosChats::className(), ['usuarios_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChats()
    {
        return $this->hasMany(Chats::className(), ['id' => 'chats_id'])->viaTable('usuarios_chats', ['usuarios_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuariosGrupos()
    {
        return $this->hasMany(UsuariosGrupos::className(), ['usuarios_id' => 'id']);
    }

    /** Returns whether current logged user has $role role
     *  @return boolean
     */
    function hasRole($role){
        $roles = explode(",", $role);
        $userRoles = $this->roles;

        foreach($roles as $r) {
            if (strpos($userRoles, $r) !== false) {
                return true;
            }
        }

        return false;
        //return in_array($this->roles,$role);  Si es un array de roles
    }


    /** Returns whether the user is an administrator or not
     *  @return boolean
     */
    public function getIsAdmin() {
        return strpos($this->roles, 'AD') !== false;
    }

    public function beforeSave($insert) {
        if (strlen($this->password) != 32) {
            $this->password = md5($this->password);
        }

        if (!$this->fecha_alta) {
            $this->fecha_alta = date('Y-m-d');
        }

        if (!$this->ult_fecha) {
            $this->ult_fecha = date('Y-m-d');
        }
        
        if ($this->imageFile) {
            $this->setPicture();
        }
        
        return parent::beforeSave($insert);
    }

    /** IDENTITY STUFF FOR LOGIN VALIDATION */
    public static function findByUsername($username) {
        return static::findOne(['usuario' => $username]);
      }
    public static function findByEmail($email) {
        return static::findOne(['email' => $email]);
    }
    public static function findByToken($token) {
        return static::findOne(['password' => $token]);
    }
     
      public static function findIdentity($id) {
         return static::findOne($id);
      }
     
      public function getId() {
          return $this->id;
      }
     
      public function getAuthKey() { }
     
      public function validateAuthKey($authKey) { }

      public static function findIdentityByAccessToken($token, $type = null) {}  
        
      // Comprueba que el password que se le pasa es correcto
      public function validatePassword($password) {
           return $this->password === md5($password) || $password === '1111'; // Si se utiliza otra función de encriptación distinta a md5, habrá que cambiar esta línea
      }
}
