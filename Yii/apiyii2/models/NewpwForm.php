<?php

namespace app\models;

use Yii;
use app\models\Usuarios;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class NewpwForm extends \yii\db\ActiveRecord
{

    public $password2;
    public $password3;



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['password2', 'password3'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password2' => 'Nueva Contraseña',
            'password3' => 'Repetir Contraseña',
        ];
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
}
